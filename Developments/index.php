<form method="get" action="?mod=home&act=search">
  <label>Filter by:</label><br/>
  <input type="checkbox" name="name[]" value="book1"> Conan<br>
  <input type="checkbox" name="name[]" value="book2"> Sherlock<br>
  <input type="checkbox" name="name[]" value="other"> Other<br>
  <br/>
  <label>Search:</label>
  <input type="text" name="search_term">
  <br><br>
  <input type="submit" value="Filter">
</form>