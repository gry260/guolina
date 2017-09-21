

<h2>Profile</h2>
<form method="post" action="app/Users/UserController.php">
    <label>
        First Name
    </label><input type="text" name="first_name"/>
    <br/>
    <label>
        Last Name
    </label>
    <input name="last_name" type="text"/>
    <br/>
    <label>
        Gender
    </label>
    <select name="gender">
        <option value="m">Male</option>
        <option value="f">Female</option>
        <option value="o">Other</option>
    </select>
    <br/>
    <label>
        Email
    </label>
    <input type="text" name="email"/>
    <br/>
    <button type="submit">Update</button>
</form>





