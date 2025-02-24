use dbListaTareas;

insert into Usuarios values('1', 'Alex', SHA2('paso', 256));

insert into Tareas values('1','1', 'Hacer la comida', now(), null),
('2','1', 'Barrer', now(), null),
('3','1', 'Hacer la compra', now(), null);