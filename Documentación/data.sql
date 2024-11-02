INSERT INTO users (username, password, email, rol, nombre, apellido, telefono, estado, puede_publicar) VALUES
('luis_baquiax', 'pass1234', 'luis@example.com', 'USUARIO', 'Luis', 'Baquiax', '12345678', 'ACTIVO', 'NO'),
('maria_hernandez', 'pass2345', 'maria@example.com', 'USUARIO', 'Maria', 'Hernandez', '87654321', 'ACTIVO', 'NO'),
('jose_gomez', 'pass3456', 'jose@example.com', 'USUARIO', 'Jose', 'Gomez', '11223344', 'ACTIVO', 'NO'),
('ana_lopez', 'pass4567', 'ana@example.com', 'USUARIO', 'Ana', 'Lopez', '55667788', 'ACTIVO', 'NO'),
('carlos_martinez', 'pass5678', 'carlos@example.com', 'USUARIO', 'Carlos', 'Martinez', '44332211', 'DESACTIVADO', 'NO'),
('useradmin', 'admin', 'admin@example.com', 'ADMIN', 'ADMIN', 'ADMIN', '00000000', 'ACTIVO', 'NO');

INSERT INTO tipo_publico (tipo_publico) VALUES
('Estudiantes'),
('Profesionales'),
('Docentes'),
('Publico General');

INSERT INTO publicacion (titulo, lugar, fecha, hora_inicio, cupos, url, username, estado) VALUES
('Conferencia de Programación', 'Sala A', '2024-10-01', '10:00', 100, 'http://confprog.com', 'luis_baquiax', 'ACEPTADO'),
('Seminario de Ciberseguridad', 'Auditorio', '2024-10-05', '10:00', 150, 'http://ciberseminar.com', 'luis_baquiax', 'ACEPTADO'),
('Charla sobre Inteligencia Artificial', 'Sala B', '2024-10-10', '10:00', 80, 'http://iacharla.com', 'luis_baquiax', 'ACEPTADO'),

('Taller de UX/UI', 'Sala C', '2024-10-02', '10:00', 50, 'http://uxtaller.com', 'maria_hernandez', 'ACEPTADO'),
('Conferencia de Diseño Web', 'Sala D', '2024-10-06', '10:00', 70, 'http://diseñoweb.com', 'maria_hernandez', 'ACEPTADO'),
('Curso de Frontend', 'Sala E', '2024-10-12', '10:00', 40, 'http://frontendcourse.com', 'maria_hernandez', 'ACEPTADO'),

('Seminario de Backend', 'Auditorio', '2024-10-03', '10:00', 120, 'http://backendseminar.com', 'jose_gomez', 'ACEPTADO'),
('Conferencia de Bases de Datos', 'Sala F', '2024-10-07', '10:00', 90, 'http://dbconference.com', 'jose_gomez', 'ACEPTADO'),
('Charla de DevOps', 'Sala G', '2024-10-13', '10:00', 60, 'http://devopscharla.com', 'jose_gomez', 'ACEPTADO'),

('Workshop de Docker', 'Sala H', '2024-10-04', '10:00', 30, 'http://dockerworkshop.com', 'ana_lopez', 'ACEPTADO'),
('Conferencia de Kubernetes', 'Auditorio', '2024-10-08', '10:00', 200, 'http://kubernetesconf.com', 'ana_lopez', 'ACEPTADO'),
('Taller de Cloud Computing', 'Sala I', '2024-10-14', '10:00', 25, 'http://cloudtaller.com', 'ana_lopez', 'ACEPTADO'),

('Seminario de Seguridad en Redes', 'Auditorio', '2024-10-09', '10:00', 110, 'http://redesseminar.com', 'carlos_martinez', 'ACEPTADO'),
('Charla sobre IoT', 'Sala J', '2024-10-11', '10:00', 80, 'http://iotcharla.com', 'carlos_martinez', 'ACEPTADO'),
('Conferencia de Big Data', 'Sala K', '2024-10-15', '10:00', 100, 'http://bigdataconf.com', 'carlos_martinez', 'RECHAZADO');

INSERT INTO publico (id_publicacion, tipo_publico) VALUES
(1, 'Estudiantes'),
(1, 'Profesionales'),
(2, 'Profesionales'),
(2, 'Publico General'),
(3, 'Docentes'),
(3, 'Estudiantes'),

(4, 'Profesionales'),
(4, 'Publico General'),
(5, 'Estudiantes'),
(6, 'Publico General'),
(7, 'Profesionales'),
(8, 'Estudiantes'),

(9, 'Profesionales'),
(10, 'Publico General'),
(11, 'Docentes'),
(12, 'Profesionales'),
(13, 'Estudiantes'),
(14, 'Publico General'),

(15, 'Publico General');

INSERT INTO motivo(nombre) VALUES
('Inadecuado'),
('Contenido no apto para menores'),
('No me gusta'),
('Causa controversia'),
('Otro');


