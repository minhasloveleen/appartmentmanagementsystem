<?php 
    include_once("includes/header.php");
?>
<div class="main">
    <?php 
        include_once("includes/adminmenu.php");
    ?>
    <div class="section">
        <div class="message">appartment added successfully</div>
        <form id="form1">
            <label for="appartmentdropdown" id="appartmentdropdownlabel">Choose a car</label>
            <select name="appartment" id="appartmentdropdown">
            <option value="1">101</option>
            <option value="2">102</option>
            <option value="3">103</option>
            <option value="4">104</option>
            </select> 
            <input type="submit" name="search" id="search"value="search">
        </form>
        <a href="" id="newappartmentbutton">+Add New Appartment </a>
        <table class="infotable">
        <tr>
            <th>Appartment no.</th>
            <th>Floor No.</th>
            <th>Description</th>
            <th>Status</th>
            <th>Delete/Modify</th>
            
        </tr>
        <tr>
            <td>Alfreds Futterkiste</td>
            <td>Maria Anders</td>
            <td>Germany</td>
            <td>Maria Anders</td>
            <td>Germany</td>
        </tr>
        <tr>
            <td>Centro comercial Moctezuma</td>
            <td>Francisco Chang</td>
            <td>Mexico</td>
            <td>Maria Anders</td>
            <td>Germany</td>
        </tr>
        <tr>
            <td>Ernst Handel</td>
            <td>Roland Mendel</td>
            <td>Austria</td>
            <td>Maria Anders</td>
            <td>Germany</td>
        </tr>
        <tr>
            <td>Island Trading</td>
            <td>Helen Bennett</td>
            <td>UK</td>
            <td>Maria Anders</td>
            <td>Germany</td>
        </tr>
        <tr>
            <td>Laughing Bacchus Winecellars</td>
            <td>Yoshi Tannamuri</td>
            <td>Canada</td>
            <td>Maria Anders</td>
            <td>Germany</td>
        </tr>
        <tr>
            <td>Magazzini Alimentari Riuniti</td>
            <td>Giovanni Rovelli</td>
            <td>Italy</td>
            <td>Maria Anders</td>
            <td>Germany</td>
        </tr>
        </table>
    </div>
</div>
<?php 
    include_once("includes/footer.php");
?>