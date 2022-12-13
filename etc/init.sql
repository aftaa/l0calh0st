create database if not exists l0calh0st;
create user l0calh0st@'localhost' identified by 'l0calh0st';
grant all privileges on l0calh0st.* to l0calh0st@'localhost';
grant process on *.* to l0calh0st@'localhost';