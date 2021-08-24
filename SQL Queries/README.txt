Nathalie Ammoun-SQL Queries- Design Errors and Solutions


Design Errors:

1- There's only one faculty table

2- There's no specific Primary Key 

2- Information was limited regarding each faculty

3- three fields for the degrees are not enough 


Solutions:

>>> Separate faculty table into separate tables. 

>>> One table is for faculty where I add "id" as primary key, in addition to fields: facFirstName, facLastName, phone, location, 'department_name' as foreign key

>>> One table is for degrees where "id" is the primary key, in addition to the fields: type (BS,MS,PhD...), name, year, institute, and 'faculty_id' as foreign key

>>> One table for departments where each department has a Chair from the faculty ('chair_id' is foreign key), the department's name is the primary key

>>> Relationship between faculty and degrees: one to many ----> each faculty member has multiple degrees, 
each degree is unique to the faculty member related to hence one to many

>>> Relationship between faculty and department: 
		>>one to many ----> each department has multiple faculty member
		>>one to one ----> each department has one chair


