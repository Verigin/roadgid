SET @pos = 0;
select 
`url`,`count`,
@pos:=CASE
        WHEN @month_no = concat(year,'-',month) THEN @pos + 1
        ELSE 1
    END AS pos,
    @month_no:=concat(year,'-',month) as date
from ( 
        SELECT year(`date`) as year, month(`date`) as month, `url`, count(*) as count 
        FROM `log` group by year(`date`),month(`date`),`url` 
    ) as stat 
order by `month`,`count` desc;