TTITLE CENTER '4.7' SKIP 2
BTITLE CENTER '*** The end ***'
COLUMN sname FORMAT A21 HEADING 'PEOPLE FROM SAME CITY'
select sname from sal where city='&1'
UNION
select cname from cust where city='&1';
TTITLE OFF
BTITLE OFF
COLUMN sname CLEAR