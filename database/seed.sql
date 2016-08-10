INSERT INTO roles (id, role) VALUES (1, 'Default');
INSERT INTO roles (id, role) VALUES (2, 'Administrator');

INSERT INTO user_roles (user_id, role_id) VALUES (1, 1);
INSERT INTO user_roles (user_id, role_id) VALUES (1, 2);