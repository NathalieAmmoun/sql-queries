SELECT id, type, name, year, institute FROM `degrees`;

SELECT F.facFirstName FROM `faculty` F, `degrees` D
WHERE D.type = 'MS' and D.name = 'Computer Science';

DELETE FROM `faculty`;

UPDATE `faculty` SET `id`='[value-1]',`facFirstName`='[value-2]',`facLastName`='[value-3]',`phone`='[value-4]',`location`='[value-5]',`departemnt`='[value-6]' WHERE 1;

INSERT INTO `faculty`(`id`, `facFirstName`, `facLastName`, `phone`, `location`, `departemnt`) VALUES ('5','Rania','Safadi','76453122','Beirut', 'Arts and Sciences');
