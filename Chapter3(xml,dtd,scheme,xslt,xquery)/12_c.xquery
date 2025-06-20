for $b in distinct-values(doc("12.xml")//author)
let $count :=count(doc("12.xml")//book[author=$b])
return <author name="{$b}" books="{$count}"/>