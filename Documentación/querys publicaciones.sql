º
// trigger para actualizar el estado de una publicacion si tiene al menos 3 reportes
DELIMITER $$

CREATE TRIGGER verificar_cantidad_reporte
AFTER INSERT ON reporte
FOR EACH ROW
BEGIN
    DECLARE num_reportes INT;

    SELECT COUNT(*) INTO num_reportes
    FROM reporte
    WHERE id_publicacion = NEW.id_publicacion;

    IF num_reportes >= 3 THEN
        UPDATE publicacion
        SET estado = 'OCULTA'
        WHERE id = NEW.id_publicacion;
    END IF;
END$$

DELIMITER ;

//trigger para actualizar si un USUARIO puede publicar de manera automatica

DELIMITER $$

CREATE TRIGGER actualizar_publicacion_automatica
AFTER INSERT ON publicacion
FOR EACH ROW
BEGIN
    DECLARE cantidad_publicacion INT;
    DECLARE puede_publicar_actual VARCHAR(10);

    SELECT puede_publicar INTO puede_publicar_actual FROM users WHERE username = NEW.username;

    SELECT COUNT(*) INTO cantidad_publicacion
    FROM publicacion
    WHERE username = NEW.username
    AND estado = 'ACEPTADO'
    AND puede_publicar_actual != 'NUNCA';

    IF cantidad_publicacion >= 2 THEN
        UPDATE users
        SET puede_publicar = 'SI'
        WHERE username = NEW.username;
    END IF;
END$$
DELIMITER ;


//trigger para banear al usuario

DELIMITER $$
CREATE TRIGGER revisar_baneo_usuario
AFTER UPDATE ON reporte
FOR EACH ROW
BEGIN
    DECLARE estado_publicar VARCHAR(5);
    DECLARE user_name VARCHAR(255);

    SELECT u.puede_publicar, u.username INTO estado_publicar, user_name
    FROM users u
    INNER JOIN publicacion p ON p.username = u.username
    INNER JOIN reporte r ON r.id_publicacion = p.id
    WHERE r.id = NEW.id;

    IF NEW.estado = 'APROVADO' THEN
        IF estado_publicar = 'SI' THEN
            UPDATE users SET puede_publicar = 'NUNCA'
            WHERE users.username = user_name;
        ELSEIF estado_publicar = 'NO' THEN
            UPDATE users SET estado = 'BANEADO'
            WHERE users.username = user_name;
        END IF;
    END IF;

END;$$
DELIMITER ;


// notificaciones

SELECT p.id, p.titulo, p.lugar, p.fecha, p.fecha, p.hora_inicio
FROM publicacion p
INNER JOIN asistencia a ON a.id_publicacion = p.id
INNER JOIN users u ON u.username = a.username
WHERE u.username = 'luis_baquiax'
AND CONCAT(p.fecha, ' ', p.hora_inicio) >= NOW();

SELECT p.id, p.titulo, p.lugar, p.fecha, p.hora_inicio, TIMESTAMPDIFF(HOUR, NOW(), p.fecha) AS horas_diferencia
FROM publicacion p
INNER JOIN asistencia a ON a.id_publicacion = p.id
INNER JOIN users u ON u.username = a.username
WHERE u.username = ?
AND p.fecha >= NOW();

SELECT p.id, p.titulo, p.lugar, p.fecha, p.hora_inicio,
      TIMESTAMPDIFF(HOUR, NOW(), ADDDATE(p.fecha, INTERVAL TIME_FORMAT(p.hora_inicio, '%H:%i:%s') HOUR_SECOND)) AS minutos_restantes
FROM publicacion p
INNER JOIN asistencia a ON a.id_publicacion = p.id
INNER JOIN users u ON u.username = a.username
WHERE u.username = ?
AND CONCAT(p.fecha, ' ', p.hora_inicio) >= NOW()

SELECT p.id, p.titulo, p.lugar, p.fecha, p.hora_inicio, TIMESTAMPDIFF(MINUTE, NOW(), CONCAT(p.fecha, ' ', p.hora_inicio)) AS minutos_restantes
FROM publicacion p
INNER JOIN asistencia a ON a.id_publicacion = p.id
INNER JOIN users u ON u.username = a.username
WHERE u.username = 'luis_baquiax'
AND CONCAT(p.fecha, ' ', p.hora_inicio) >= NOW();
