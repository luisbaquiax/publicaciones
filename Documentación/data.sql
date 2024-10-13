INSERT INTO users (username, password, email, rol, nombre, apellido, telefono, estado) VALUES
('luis_baquiax', 'pass1234', 'luis@example.com', 'admin', 'Luis', 'Baquiax', '12345678', 'activo'),
('maria_hernandez', 'pass2345', 'maria@example.com', 'usuario', 'Maria', 'Hernandez', '87654321', 'activo'),
('jose_gomez', 'pass3456', 'jose@example.com', 'moderador', 'Jose', 'Gomez', '11223344', 'activo'),
('ana_lopez', 'pass4567', 'ana@example.com', 'usuario', 'Ana', 'Lopez', '55667788', 'activo'),
('carlos_martinez', 'pass5678', 'carlos@example.com', 'usuario', 'Carlos', 'Martinez', '44332211', 'inactivo');

INSERT INTO tipo_publico (tipo_publico) VALUES
('Estudiantes'),
('Profesionales'),
('Docentes'),
('Publico General');

INSERT INTO publicacion (titulo, lugar, fecha, cupos, url, username, estado) VALUES
('Conferencia de Programación', 'Sala A', '2024-10-01', 100, 'http://confprog.com', 'luis_baquiax', 'disponible'),
('Seminario de Ciberseguridad', 'Auditorio', '2024-10-05', 150, 'http://ciberseminar.com', 'luis_baquiax', 'disponible'),
('Charla sobre Inteligencia Artificial', 'Sala B', '2024-10-10', 80, 'http://iacharla.com', 'luis_baquiax', 'lleno'),

('Taller de UX/UI', 'Sala C', '2024-10-02', 50, 'http://uxtaller.com', 'maria_hernandez', 'disponible'),
('Conferencia de Diseño Web', 'Sala D', '2024-10-06', 70, 'http://diseñoweb.com', 'maria_hernandez', 'disponible'),
('Curso de Frontend', 'Sala E', '2024-10-12', 40, 'http://frontendcourse.com', 'maria_hernandez', 'cancelado'),

('Seminario de Backend', 'Auditorio', '2024-10-03', 120, 'http://backendseminar.com', 'jose_gomez', 'disponible'),
('Conferencia de Bases de Datos', 'Sala F', '2024-10-07', 90, 'http://dbconference.com', 'jose_gomez', 'disponible'),
('Charla de DevOps', 'Sala G', '2024-10-13', 60, 'http://devopscharla.com', 'jose_gomez', 'disponible'),

('Workshop de Docker', 'Sala H', '2024-10-04', 30, 'http://dockerworkshop.com', 'ana_lopez', 'disponible'),
('Conferencia de Kubernetes', 'Auditorio', '2024-10-08', 200, 'http://kubernetesconf.com', 'ana_lopez', 'disponible'),
('Taller de Cloud Computing', 'Sala I', '2024-10-14', 25, 'http://cloudtaller.com', 'ana_lopez', 'disponible'),

('Seminario de Seguridad en Redes', 'Auditorio', '2024-10-09', 110, 'http://redesseminar.com', 'carlos_martinez', 'disponible'),
('Charla sobre IoT', 'Sala J', '2024-10-11', 80, 'http://iotcharla.com', 'carlos_martinez', 'disponible'),
('Conferencia de Big Data', 'Sala K', '2024-10-15', 100, 'http://bigdataconf.com', 'carlos_martinez', 'cancelado');

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

