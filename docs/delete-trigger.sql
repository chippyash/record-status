CREATE TRIGGER prevent_deletion
  BEFORE DELETE
  ON table_name FOR EACH ROW

  BEGIN
    signal sqlstate '45000' set message_text = 'Cannot delete record - set status instead';
  END;