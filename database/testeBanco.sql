-- Tabela "Users" - para armazenar informações dos usuários
CREATE TABLE Users (
  user_id INT PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(255),
  password VARCHAR(255),
  other_user_data VARCHAR(255)
);

-- Tabela "Items" - para armazenar informações dos itens
CREATE TABLE Items (
  item_id INT PRIMARY KEY AUTO_INCREMENT,
  item_name VARCHAR(255),
  item_type VARCHAR(255),
  other_item_data VARCHAR(255)
);

CREATE TABLE grupo (
  group_id INT PRIMARY KEY AUTO_INCREMENT,
  group_name VARCHAR(255),
  other_group_data VARCHAR(255)
);

-- Tabela "Group_Inventory" - para armazenar os itens no inventário dos grupos
CREATE TABLE Group_Inventory (
  group_id INT,
  item_id INT,
  quantity INT,
  added_by INT,
  removed_by INT,
  FOREIGN KEY (group_id) REFERENCES grupo(group_id),
  FOREIGN KEY (item_id) REFERENCES Items(item_id),
  FOREIGN KEY (added_by) REFERENCES Users(user_id),
  FOREIGN KEY (removed_by) REFERENCES Users(user_id)
);