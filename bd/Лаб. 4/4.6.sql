TTITLE CENTER '4.6' SKIP 2
BTITLE CENTER '*** The end ***'
ACCEPT name CHAR PROMPT 'Enter the name of seller:'
select first.sname, first.city, first.comm, count(second.snum) as count, sum(second.amt) as sum
from sal first, ord second
where first.sname='&name'
and first.snum=second.snum
group by first.sname, first.city, first.comm;
TTITLE OFF
BTITLE OFF