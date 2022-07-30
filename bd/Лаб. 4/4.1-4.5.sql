/*4.1 - 4.3*/
drop table cust_copy;
/*4.1*/
create table cust_copy as select * from cust;
desc CUST;
desc CUST_COPY;
select * from cust;
select * from cust_copy;
/*4.2*/
alter table cust_copy add (constraint pk_tb primary key(cnum));
select constraint_name, column_name from user_cons_columns where table_name='CUST_COPY';

/*4.4*/
insert into cust_copy values (2055, 'Hector', 'Bucharest', 500, 1010);
insert into cust_copy values (2056, 'Igor', 'Warshawa', 100, 1020);
select * from cust_copy; 
delete from cust_copy where cnum=2056; 
select * from cust_copy; 

/*4.5*/
spool text.txt;
insert into cust_copy values(2057, 'Marpha', 'Oslo', 250, 1015);
select * from cust_copy; 
insert into cust_copy values(2058, 'Lili', 'London', 150, 1022);
select * from cust_copy;
update cust_copy set rating=rating*2;
select * from cust_copy;
spool off;