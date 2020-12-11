CREATE TABLE IF NOT EXISTS manage_works (
  id SERIAL PRIMARY KEY,
  work_name  CHARACTER VARYING(255),
  start_date TIMESTAMP,
  end_date   TIMESTAMP ,
  status     SMALLINT ,
  created_at TIMESTAMP,
  updated_at TIMESTAMP ,
  delete_at  TIMESTAMP
);