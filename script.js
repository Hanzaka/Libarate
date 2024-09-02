function adminLogIn() {
  var username = document.getElementById("username");
  var password = document.getElementById("password");

  var form = new FormData();
  form.append("username", username.value);
  form.append("password", password.value);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      if (response == "Success") {
        window.location = "dashboard.php";
      } else {
        alert(response);
      }
    }
  }

  request.open("POST", "adminLogInProcess.php", true);
  request.send(form);
}

function logout() {
  localStorage.clear();
  window.location = "login.php";
}

function Userlogout() {
  localStorage.clear();
  window.location = "userLogin.php";
}

function createUser() {

  var id = document.getElementById("id");
  var fname = document.getElementById("fname");
  var lname = document.getElementById("lname");
  var email = document.getElementById("email");
  var mobile = document.getElementById("mobile");
  var password = document.getElementById("password");

  var form = new FormData();
  form.append("id", id.value);
  form.append("fname", fname.value);
  form.append("lname", lname.value);
  form.append("mobile", mobile.value);
  form.append("email", email.value);
  form.append("password", password.value);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      if (response == "Success") {
        alert("User Account Created Successfuly");
        window.location.reload();
        document.getElementById("id").value = '';
        document.getElementById("fname").value = '';
        document.getElementById("lname").value = '';
        document.getElementById("email").value = '';
        document.getElementById("mobile").value = '';
        document.getElementById("password").value = '';
      } else {
        alert(response);
      }
    }
  }

  request.open("POST", "createUserProcess.php", true);
  request.send(form);
}

function loadUsers() {

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      document.getElementById("content").innerHTML = response;
    }
  }

  request.open("GET", "loadUserProcess.php", true);
  request.send();
}

function addAuthor() {
  var author = document.getElementById("author");

  var form = new FormData();
  form.append("author", author.value);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      if (response == "Success") {
        alert("Author Added Successfuly");
        window.location.reload();
        document.getElementById("author").value = '';
      } else {
        alert(response);
      }
    }
  }

  request.open("POST", "createAuthorProcess.php", true);
  request.send(form);
}

function addPublisher() {
  var publisher = document.getElementById("publisher");

  var form = new FormData();
  form.append("publisher", publisher.value);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      if (response == "Success") {
        alert("Publisher Added Successfuly");
        window.location.reload();
        document.getElementById("publisher").value = '';
      } else {
        alert(response);
      }
    }
  }

  request.open("POST", "createPublisherProcess.php", true);
  request.send(form);
}

function addCategory() {
  var category = document.getElementById("category");

  var form = new FormData();
  form.append("category", category.value);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      if (response == "Success") {
        alert("Category Added Successfuly");
        window.location.reload();
        document.getElementById("category").value = '';
      } else {
        alert(response);
      }
    }
  }

  request.open("POST", "createCategoryProcess.php", true);
  request.send(form);
}

function addBook() {

  var bookId = document.getElementById("bookId");
  var bookName = document.getElementById("bookName");
  var category = document.getElementById("category");
  var author = document.getElementById("author");
  var publisher = document.getElementById("publisher");

  var form = new FormData();
  form.append("bookId", bookId.value);
  form.append("bookName", bookName.value);
  form.append("category", category.value);
  form.append("author", author.value);
  form.append("publisher", publisher.value);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      if (response == "Success") {
        alert("Book Added Successfuly");
        window.location.reload();
        document.getElementById("bookId").value = '';
        document.getElementById("bookName").value = '';
        document.getElementById("category").value = '';
        document.getElementById("author").value = '';
        document.getElementById("publisher").value = '';
      } else {
        alert(response);
      }
    }
  }

  request.open("POST", "addBookProcess.php", true);
  request.send(form);
}

function loadBooks() {

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      document.getElementById("content").innerHTML = response;
    }
  }

  request.open("GET", "loadBookProcess.php", true);
  request.send();
}

function brrowBook() {

  var bookId = document.getElementById("bookId");
  var userId = document.getElementById("userId");
  var brrowedDate = document.getElementById("brrowedDate");
  var returnDate = document.getElementById("returnDate");

  var form = new FormData();
  form.append("bookId", bookId.value);
  form.append("userId", userId.value);
  form.append("brrowedDate", brrowedDate.value);
  form.append("returnDate", returnDate.value);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      if (response == "Success") {
        alert("Brrowed Book Successfuly");
        window.location.reload();
        document.getElementById("bookId").value = '';
        document.getElementById("userId").value = '';
        document.getElementById("brrowedDate").value = '';
        document.getElementById("returnDate").value = '';
      } else {
        alert(response);
      }
    }
  }

  request.open("POST", "brrowBookProcess.php", true);
  request.send(form);

}

function loadBrrowedBooks() {
  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      document.getElementById("content").innerHTML = response;
    }
  }

  request.open("GET", "loadBrrowedBooksProcess.php", true);
  request.send();
}

function changeBrrowStatus(id) {
  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      if (response == "Success") {
        window.location.reload();
      } else {
        alert(response);
      }
    }
  }

  request.open("GET", "changeBrrowStatusProcess.php?id=" + id, true);
  request.send();
}

function loadPublishers() {

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      document.getElementById("content").innerHTML = response;
    }
  }

  request.open("GET", "loadPublishersProcess.php", true);
  request.send();
}

function loadAuthors() {

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      document.getElementById("content").innerHTML = response;
    }
  }

  request.open("GET", "loadAuthorsProcess.php", true);
  request.send();
}

function searchUser() {

  var searchtext = document.getElementById("search");

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      document.getElementById("content").innerHTML = response;
    }
  }

  request.open("GET", "userSearch.php?searchtext=" + searchtext.value, true);
  request.send();
}

function loadCategory() {
  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      document.getElementById("content").innerHTML = response;
    }
  }

  request.open("GET", "loadCategoryProcess.php", true);
  request.send();
}

function filterBooks() {
  var categorySelect = document.getElementById("categorySelect");
  var authorSelect = document.getElementById("authorSelect");
  var publisherSelect = document.getElementById("publisherSelect");
  var nameSort = document.getElementById("nameSort");

  var form = new FormData();
  form.append("categorySelect", categorySelect.value);
  form.append("authorSelect", authorSelect.value);
  form.append("publisherSelect", publisherSelect.value);
  form.append("nameSort", nameSort.value);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      document.getElementById("content").innerHTML = response;
      document.getElementById("categorySelect").value = '0';
      document.getElementById("authorSelect").value = '0';
      document.getElementById("publisherSelect").value = '0';

    }
  }
  request.open("POST", "searchBookProcess.php", true);
  request.send(form);
}

function editUser(id, fname, lname, email, mobile) {
  document.getElementById("id").value = id;
  document.getElementById("fname").value = fname;
  document.getElementById("lname").value = lname;
  document.getElementById("email").value = email;
  document.getElementById("mobile").value = mobile;
  document.getElementById("createButton").innerHTML = "Update User";
  document.getElementById("createButton").setAttribute("onclick", "updateUser();");
}

function updateUser() {
  var id = document.getElementById("id");
  var fname = document.getElementById("fname");
  var lname = document.getElementById("lname");
  var email = document.getElementById("email");
  var mobile = document.getElementById("mobile");
  var password = document.getElementById("password");

  var form = new FormData();
  form.append("id", id.value);
  form.append("fname", fname.value);
  form.append("lname", lname.value);
  form.append("mobile", mobile.value);
  form.append("email", email.value);
  form.append("password", password.value);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      if (response == "Success") {
        document.getElementById("createButton").setAttribute("onclick", "createUser();");
        alert("User Account Details Updated Successfuly");
        window.location.reload();
        document.getElementById("id").value = '';
        document.getElementById("fname").value = '';
        document.getElementById("lname").value = '';
        document.getElementById("email").value = '';
        document.getElementById("mobile").value = '';
        document.getElementById("password").value = '';
      } else {
        alert(response);
      }
    }
  }

  request.open("POST", "updateUserProcess.php", true);
  request.send(form);

}

function userLogIn() {
  var username = document.getElementById("username");
  var password = document.getElementById("password");

  var form = new FormData();
  form.append("username", username.value);
  form.append("password", password.value);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      if (response == "Success") {
        window.location = "userDashboard.php";
      } else {
        alert(response);
      }
    }
  }

  request.open("POST", "userLogInProcess.php", true);
  request.send(form);
}

function UserfilterBooks() {
  var categorySelect = document.getElementById("categorySelect");
  var authorSelect = document.getElementById("authorSelect");
  var publisherSelect = document.getElementById("publisherSelect");
  var nameSort = document.getElementById("nameSort");

  var form = new FormData();
  form.append("categorySelect", categorySelect.value);
  form.append("authorSelect", authorSelect.value);
  form.append("publisherSelect", publisherSelect.value);
  form.append("nameSort", nameSort.value);
  form.append("userId", userId);  // Use the userId variable

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      document.getElementById("content").innerHTML = response;
      document.getElementById("categorySelect").value = '0';
      document.getElementById("authorSelect").value = '0';
      document.getElementById("publisherSelect").value = '0';
    }
  }
  request.open("POST", "loadUserBookProcess.php", true);
  request.send(form);
}


function userBorrowRequest(bookName, categoryName, authorname, publisherName, userID) {
  var formData = new FormData();
  formData.append("bookName", bookName);
  formData.append("categoryName", categoryName);
  formData.append("authorName", authorname);
  formData.append("publisherName", publisherName);
  formData.append("userID", userID);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState === 4 && request.status === 200) {
      var response = request.responseText;
      if (response === "Success") {
        alert("Book Borrow");
        window.location.reload();
      } else {
        alert(response);
      }
    }
  };

  request.open("POST", "userBorrowRequestProcess.php", true);
  request.send(formData);
}

function cancelBorrow(userID) {
  var formData = new FormData();
  formData.append("userID", userID);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState === 4 && request.status === 200) {
      var response = request.responseText;
      if (response === "Success") {
        window.location.reload();
      } else {
        alert(response);
      }
    }
  };

  request.open("POST", "cancelBorrowProcess.php", true);
  request.send(formData);
}

function borrowRequestsByUser() {
  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      document.getElementById("content").innerHTML = response;
    }
  }

  request.open("GET", "loadBorrowRequestsByUserProcess.php", true);
  request.send();
}


function acceptBorrowRequest(bookId, categoryId, authorId, publisherId, brrowDate, userId) {

  var url = "brrowedBooks.php?bookId=" + encodeURIComponent(bookId) +
    "&categoryId=" + encodeURIComponent(categoryId) +
    "&authorId=" + encodeURIComponent(authorId) +
    "&publisherId=" + encodeURIComponent(publisherId) +
    "&brrowDate=" + encodeURIComponent(brrowDate) +
    "&userId=" + encodeURIComponent(userId);

  window.location.href = url;

  var formData = new FormData();
  formData.append("userId", userId);
  formData.append("bookId", bookId);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      if (response == "Success") {
        window.borrowRequest.php.reload();
      }else{
        alert(response);
      }
    }
  }

  request.open("POST", "deleteBorrowRequestsByUserProcess.php", true);
  request.send(formData);
}