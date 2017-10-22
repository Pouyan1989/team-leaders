*this code contains 8 files :main html + 7 php files 
*put all the files isided the www directory 
*i used xampp
*open a browser and browse "main.html" 
*Save you order in the name of "order.json" via the upload button on "main.html" 
*Upload manually your product file in the name of "products.json" into your e.g. htdocs,www...,folder 
*the code reads the prices including (total,unit-price) form your "order.json".make sure you have the right calucaltions. 
*the code reads the category id from "products.json". 
*browse your "order.json" and click upload .you can view your uploaded order using "show json" button or delete the file by hitting the "delete json" button. 
*in case you wanna upload a new order ,you should delete and upload again or you can edit the file ! upto you ! 
*make sure jsons are valid to avoid errors 
*hit calculate to continue 
*the code looks for multiplications of 5 in the switch category and subtracts one unit-price from total in the end as a gift .for example for ten ,two "unit-price" will be subtracted. 
*final price will get a discount if the total price of everything together at the beginning(defined by total) is more than 1000 . 
