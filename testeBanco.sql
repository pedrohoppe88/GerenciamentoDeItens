CREATE TABLE Users (
  user_id INT PRIMARY KEY,
  username VARCHAR(255),
  password VARCHAR(255),
  other_user_data VARCHAR(255)
);

-- Tabela "Items" - para armazenar informações dos itens
CREATE TABLE Items (
  item_id INT PRIMARY KEY,
  item_name VARCHAR(255),
  item_type VARCHAR(255),
  other_item_data VARCHAR(255)
);

-- Tabela "Inventory" - para armazenar os itens no inventário dos usuários
CREATE TABLE Inventory (
  user_id INT,
  item_id INT,
  quantity INT,
  added_by INT,
  removed_by INT,
  FOREIGN KEY (user_id) REFERENCES Users(user_id),
  FOREIGN KEY (item_id) REFERENCES Items(item_id),
  FOREIGN KEY (added_by) REFERENCES Users(user_id),
  FOREIGN KEY (removed_by) REFERENCES Users(user_id)
);

-- Tabela "Groups" - para armazenar informações dos grupos
CREATE TABLE Groups (
  group_id INT PRIMARY KEY,
  group_name VARCHAR(255),
  other_group_data VARCHAR(255)
);

-- Tabela "Group_Members" - para armazenar informações dos membros dos grupos
CREATE TABLE Group_Members (
  group_id INT,
  user_id INT,
  FOREIGN KEY (group_id) REFERENCES Groups(group_id),
  FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

CREATE TABLE Group_Inventory (
  group_id INT,
  item_id INT,
  quantity INT,
  FOREIGN KEY (group_id) REFERENCES Groups(group_id),
  FOREIGN KEY (item_id) REFERENCES Items(item_id)
);