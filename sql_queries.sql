SELECT id, type, name, year, institute FROM `degrees`;

SELECT F.facFirstName FROM `faculty` F, `degrees` D
WHERE D.type = 'MS' AND D.name = 'Computer Science';

DELETE FROM `faculty`;

INSERT INTO `faculty`(`id`, `facFirstName`, `facLastName`, `phone`, `location`, `departemnt`) VALUES ('5','Rania','Safadi','76453122','Beirut', 'Arts and Sciences');
