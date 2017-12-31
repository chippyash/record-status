CREATE TRIGGER prevent_update_if_defunct
  BEFORE UPDATE
  ON table_name FOR EACH ROW

  BEGIN
    IF old.rowSts = 'defunct' THEN
      signal sqlstate '45000' set message_text = 'Cannot update defunct record';
    END IF;
  END;