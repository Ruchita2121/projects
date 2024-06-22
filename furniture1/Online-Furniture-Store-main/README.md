- Video Link

https://youtu.be/wAuPARG0eaw


Web Programming
        PHP & MySQL Assignment 2
			

          Table of Content

•	Checklist
•	Identification of weaknesses & Proposed Fixes
•	Testing
•	References
Admin Login 
Username: - “admin”
Password: - “admin”


•	Checklist
![image](https://user-images.githubusercontent.com/58506840/104928369-86414100-59dd-11eb-9980-a98eec4b1747.png)


•	Identification of weakness & Proposed Fixes


As we started the assignment we came across a lot of errors. For the filtering out furniture there was a file called furniture.php in admin folder which needed access to the database for the furniture and category of the product, the error was caused when it was not connected properly and it showed these errors  which we later identified that the code for connection of database was not correct and later fixed the errors and then we were able to filter out categories and conditions and later looked like this.
 ![image](https://user-images.githubusercontent.com/58506840/104928388-90633f80-59dd-11eb-9b77-171f623c308e.png)
As we started we had some issues that included setting up vagrant and virtual box. In the command prompt we were not able to run the vagrant files and then the file location was also an important aspect.
![image](https://user-images.githubusercontent.com/58506840/104928403-96f1b700-59dd-11eb-8acb-06fee5b23808.png)
While working with the command line interface we figured out that vagrant file and the websites should be in the same folder but before that we were having problems like, file error or allowance issues error downloading remote file such as 
 ![image](https://user-images.githubusercontent.com/58506840/104928432-9eb15b80-59dd-11eb-95f8-7d6f14014ec5.png)

As we went through the tutorial on the vagrant site we realised the importance of file location so when the websites and vagrant file was put in correct places the outcome was as needed 
 ![image](https://user-images.githubusercontent.com/58506840/104928449-a53fd300-59dd-11eb-8254-81aee8341f33.png)
Coming to the php coding we came across various query and variables and learned a lot through out the assignment. We all had a common issue at first which was how to connect to the database directly
 ![image](https://user-images.githubusercontent.com/58506840/104928472-ab35b400-59dd-11eb-82a3-88dcc2c39ebd.png)
Addition of the server name and host name and password was very necessary and then there another idea of putting the code for accessing database in one file and then just require that file every time we need to access the database. But I stuck with the orthodox method of writing down the whole code on every file that required to get the information from the database. Which can also be done for repetitive files like the footer of the webpage or the side menu, but I decided to add that codes manually on each of the files. $pdo was the variable used for connecting the given website to the database.

When we come to the database some tables needed the auto increment functionality which sql workbench had to offer 
 ![image](https://user-images.githubusercontent.com/58506840/104928503-b25cc200-59dd-11eb-847e-7f638fa790cd.png)
So once if an Id is created another input will get another id and the previous id can never be attained back. Once if we delete the product containing that id the id itself is deleted and we can’t get the previous id back.
 ![image](https://user-images.githubusercontent.com/58506840/104928534-b852a300-59dd-11eb-9a28-b2f3d6e1427c.png)
We had to add a number of different tables so that the required php can access the desired information as we coded 
 ![image](https://user-images.githubusercontent.com/58506840/104928554-bdafed80-59dd-11eb-92ee-185db90ec1d1.png)
Every time there is an input on the website its directly inserted in the designated table. For instance, we were not able to add a new product 
 ![image](https://user-images.githubusercontent.com/58506840/104928572-c3a5ce80-59dd-11eb-8628-a20f8ca9e670.png)
Inside the database so we got this error and we tried to fix it we came across the variable for category was not set in the addfurniture.php file 
 ![image](https://user-images.githubusercontent.com/58506840/104928604-ca344600-59dd-11eb-87c8-fec6339905e5.png)
Which later was corrected, and we got a desired output of adding the product into the database. Every so often, we see an application in which each table is in a different database. There are purposes behind doing that in exceptionally extensive databases, yet for a normal application, you needn't bother with this dimension of division. Moreover, even though it's conceivable to perform connection inquiries over various databases, I firmly suggest against it. The language structure is progressively intricate. Reinforcement and re-establish isn't effectively overseen. The language structure could conceivably work between various database motors. What's more, it's hard to pursue the social structure when the tables are part over various databases.

We had an issues with the php code for the existing date which was included in the footer of the files 
 ![image](https://user-images.githubusercontent.com/58506840/104928621-d02a2700-59dd-11eb-8d0d-16be3c9ab860.png)
The changes we made were not shown directly after refreshing the screen which we later understood that sometimes the webpage cannot access some data without force refresh for which we had to press 2 keys simultaneously that is ctrl+f5 after which the code worked on the webpage.
![image](https://user-images.githubusercontent.com/58506840/104928634-d5877180-59dd-11eb-9d2c-84196c2bcb18.png)
 
Social databases aren't care for programming dialects. They don't have exhibit types. Rather, they use relations among tables to make a one-to-many structure between articles, which has a similar impact as an exhibit. One issue I've seen with applications is when engineers endeavour to utilize a database as if it were a programming language, making clusters by utilizing content strings with comma-isolated identifiers. Take a gander at the pattern underneath. Which was later solved after fixing the errors

Databases are powerful tools, and -- like all powerful tools -- they can be abused if you don't know how to use them properly. The trick behind identifying and solving these problems is to better understand the underlying technology. For too long, I've heard business logic coders lament that they don't want to have to understand the database or the SQL code. They wrap the database in objects and wonder why the performance is so poor. They fail to realize that understanding the SQL is fundamental to turning the database from a difficult necessity into a powerful ally. While working with the database I realised even if the code looks clean it will have a minor error and the whole code wont work based on that and I’ve learned to look throughout the codes and understand thoroughly.

•	Testing
  
To make our website it was supposed to be password protected and should not be accessed without the permission so the following if and else statement were tested 
 ![image](https://user-images.githubusercontent.com/58506840/104928658-dd471600-59dd-11eb-90cb-7cdd87e2093c.png)
In case the password is incorrect it would lead to the else statement 
![image](https://user-images.githubusercontent.com/58506840/104928677-e33cf700-59dd-11eb-8a72-6e3e8880c7ae.png)
Adding customer contacts to the admin page was another task but was like adding the furniture so while testing we got a few errors relating to the php code which were later fixed to get the desired outcome 
 
![image](https://user-images.githubusercontent.com/58506840/104928723-f0f27c80-59dd-11eb-957b-6bbbf859082a.png)

The objective of testing site isn't to discover bugs or to improve site. It's to lessen the hazard by proactively finding and disposing of issues that would most incredibly sway the client utilizing the site. Effect can occur with the recurrence of a mistake or undesired usefulness, or it tends to be a result of the seriousness of the problem. If we had a bug in our bookkeeping site that made it solidify up for a second or two at whatever point an esteem higher than 1,000 pounds was entered, it would not have an immense effect. Not with standing, that would be a sufficiently high recurrence to be extremely irritating to the client. 
Then again, on the off chance that we had a bug in the database that made most of the information become adulterated each 1,000th time the information was spared, that would have a gigantic effect however at an exceptionally low recurrence.

At the point when a bug is distinguished right on time inside the site and code it tends to be tended to quicker and at a lower cost. A security bug is the same as a useful or exhibition-based bug in such manner. A key advance in making this conceivable is to teach the improvement and QA groups about normal security issues and the approaches to distinguish and counteract them. Albeit new libraries, instruments, or dialects can help configuration better projects (with less security bugs), new dangers emerge always and designers must know about the dangers that influence the product they are creating. Instruction in security testing likewise enables engineers to obtain the proper attitude to test an application from an aggressor's point of view. This enables every association to consider security issues as a major aspect of their current duties.

To have all the functionalities on one page while adding a new furniture it had to go through a lot of other php files like for a new category we used code to require category and while testing the errors were resolved 
 

![image](https://user-images.githubusercontent.com/58506840/104928739-f6e85d80-59dd-11eb-9924-586039a14fe8.png)


We did a source review for testing first, Source code survey is the procedure of physically checking the source code of a site for security issues. Numerous genuine security vulnerabilities can't be distinguished with some other type of investigation or testing. As the well-known saying goes "in the event that you need to realize what's truly going on, go directly to the source." Almost all security specialists concur that there is not a viable replacement for really taking a gander at the code. All the data for recognizing security issues is there in the code some place. Not at all like testing outsider shut programming, for example, working frameworks, when testing web applications, the source code ought to be made accessible for testing purposes.

 ![image](https://user-images.githubusercontent.com/58506840/104928758-fe0f6b80-59dd-11eb-8a0c-e0995cc1885d.png)
 
Instances of issues that are especially helpful for being found through source code audits incorporate simultaneousness issues, defective business rationale, get to control issues, and cryptographic shortcomings just as different types of vindictive code. These issues frequently show themselves as the most destructive vulnerabilities in sites. Source code examination can likewise be very proficient to discover usage issues, for example, places where input approval was not performed or when come up short open control systems might be available. In any case, remember that operational methodology should be checked on too, since the source code being sent probably won't be equivalent to the one being broke down thus. While the idea of manual assessments and human audits is basic, they can be among the most dominant and compelling methods accessible. By asking somebody how something functions and for what good reason it was actualized with a goal in mind, the analyser can rapidly decide whether any security concerns are probably going to be clear. Manual examinations and audits are one of only a handful couple of approaches to test the product advancement life-cycle process itself and to guarantee that there is enough strategy or range of abilities set up.
In software engineering, code inclusion is a measure used to portray how much the source code of a program is tried by a specific test suite. A program with high code inclusion has been all the more completely tried and has a lower shot of containing programming bugs than a program with low code inclusion.

PHPUnit tests had outcomes 
 ![image](https://user-images.githubusercontent.com/58506840/104928773-049de300-59de-11eb-9afd-083566c2bbb0.png)

 ![image](https://user-images.githubusercontent.com/58506840/104928797-09fb2d80-59de-11eb-948b-15bba23b2534.png)


Which after fixing with required codes and testing gave the desired output. Well php unit tests all the included classes in the test venture. Of the considerable number of lines (all things considered) together, 8 are secured.  On the off chance that 100% of the lines of a strategy are secured, at that point that technique is secured. It creates the impression that those eight lines are packed in only one strategy. What's more, if 100% of the lines of a class are secured. That class is secured also. Since your test venture includes just a single class, and 8/76 are secured. That class isn't secured. 
An inclusion report is much of the time an outline when testing an expansive library (with several classes). The report possibly condenses the tests so one can choose if extra tests are fundamental.



