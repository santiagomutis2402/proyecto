   SET @v1=(SELECT count(actividad) FROM `actividades` WHERE `actividad`=actividades)
    
    if @v1=0 THEN
    insert into actividades(actividad) values (actividades);
    set @v2:=(select id from actividades where actividad=actividades);   
SELECT
    actividad
FROM
    actividades;
UPDATE
    actividades
SET
    titulo = titul,
    fecha = fech,
    hora_inicio = hdesde,
    hora_final = hHasta,
    estado = estado,
    id_actividad = @v2,
    descripcion = descripcion2,
    ubicacion = ubi
WHERE
    Id = ID;
    else 
     set @v2:=(select id from actividades where actividad=actividades);   
SELECT
    actividad
FROM
    actividades;
UPDATE
    actividades
SET
    titulo = titul,
    fecha = fech,
    hora_inicio = hdesde,
    hora_final = hHasta,
    estado = estado,
    id_actividad = @v2,
    descripcion = descripcion2,
    ubicacion = ubi
WHERE
    Id = ID;