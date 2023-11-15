create
    definer = root@localhost procedure FilterByIDs(IN column_name varchar(50), IN ids_list varchar(255))
BEGIN
    SET @query = CONCAT('SELECT * FROM tbl_uploaded_files WHERE ', column_name, ' IN (', ids_list, ')');
    PREPARE statement FROM @query;
    EXECUTE statement;
    DEALLOCATE PREPARE statement;
END;

