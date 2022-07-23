-- migration script

TRUNCATE persons;
TRUNCATE users;

-- run php script http://localhost/CAVS/employees/load -> this loads employees