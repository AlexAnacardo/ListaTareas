use dbListaTareas;

insert into Usuarios values('Alex', 'Alex Asensio Sanchez', SHA2('paso', 256));

insert into Tareas (CodUsuario, DescripcionTarea, FechaCreacion, FechaTareaRealizada)
values('Alex', 'Hacer la comida', now(), null),
('Alex', 'Barrer', now(), null),
('Alex', 'Hacer la compra', now(), null),
('Alex', 'Programar', now(), null),
('Alex', 'Hacer CSS', now(), null);