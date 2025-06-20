for $b in doc("12.xml")//book
order by $b/price
return $b/title