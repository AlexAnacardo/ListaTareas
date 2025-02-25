use dbListaTareas;

insert into Usuarios values('Alex', 'Alex Asensio Sanchez', SHA2('paso', 256));

insert into Tareas values('1','Alex', 'Hacer la comida', now(), null),
('2','Alex', 'Barrer', now(), null),
('3','Alex', 'Hacer la compra', now(), null),
('4','Alex', 'Programar', now(), null),
('5','Alex', 'Hacer CSS', now(), null);