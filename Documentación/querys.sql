SELECT id, titulo, lugar, fecha, cupos, url, username, estado
FROM publicacion p
INNER JOIN publico pu ON p.id = pu.id_publicacion
WHERE tipo_publico = 'Docentes';
