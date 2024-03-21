Web Server IP Address:  35.212.183.113
MySQL Password: !Nf100%

Part 1 (Basic Website Requireents)
1. Pull code from Github, soonlong will upload his version
2. Change image picture to current fish
3. Create SQL Table for fish information (basically a database)
4. Create Login SESSION(individual)
5. Create Quantity and Cart button under each fish
6. Create view for personalised cart
7. Personalized Cart allows for quantity changes and removal.
8. Search bar that utilize database to look for fish.
9. About Us Page talking about our lord and saviour Yao Hao. 
   
Part 2 (Create Admin Rights)
1. Create Admin account
2. admin can change the amt of items available aka inv management.
3. update inventory after purchase.

SQL Tables
Members Table (MemberID, MemberName, MemberEmail, MemberPassword, MemberAddress)
Fish Table (FishID, FishName, FishPrice, FishDescription, FishImage)
Orders Table (OrderID (PK), MemberID (FK), FishID1, FishID2, FishID2, DateOfTransaction)