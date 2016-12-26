resources:

http://dev.mysql.com/doc/refman/5.7/en/
(because MySQL version is 5.7)
Sometimes the database has long delays, consider creating a new one on a different server and generate the tables using Aloraa.sql.
It respects some of the normalizations, that's why it has 7 tables now.

https://www.db4free.net/phpMyAdmin/index.php to log in to the web interface; I suggest MySQL Workbench.

The ER Diagram was generated using MySQL Workbench directly from Aloraa.sql.

The website is meant to have a home page accessible by anyone; still, if the user is logged in, the log out button will be displayed; otherwise, log in and sign up are displayed.
It has a 'Secret page' that can be accessed only if the user is logged in; otherwise, this page redirects to the login page.
Sign up forwards to home page.
Log in forwards to the secret page (which is not ideal, but I won't spend any more time. Ideally, the page that requests the user to be logged in(like the secret one and many others) should forward to log in, and add a resource to remember where it was forwarded from. After logging in, it should forward to the previously 'secret' page requested).

It should be easy to integrate with your system.

Website test credentials:
email: 1@test.com
pass: 1

And you can add many more, but the test one should be generic & simple.
I made all inputs to be required. I changed their type, but the CSS didn't work for input type='email', so I reverted it to 'text'. You should look into it.

You can find in the php files examples of POST and SELECT. Iterations through rows from SELECT should be fairly easy, as in:
	$stmt = $conn->prepare('SELECT * FROM users WHERE email = :email');
	$stmt->bindParam(':email', $email);
	$stmt->execute();
	$rows = $stmt->fetchAll();
	echo json_encode($rows);

  foreach ($rows as $rs) {
		$id = $rs['id'];
		echo "";
		echo $id;
		echo "";
		echo $rs['password'];
	}
