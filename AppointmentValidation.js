
        function validateForm() {
            var name = document.getElementById("name").value.trim();
            var dob = document.getElementById("dob").value.trim();
            //  var gender = document.querySelector('input[name="gender"]:checked');
            var radios = document.getElementsByName('gender');
            var radioChecked = false;
            for (var i = 0; i < radios.length; i++) {
                if (radios[i].checked) {
                    radioChecked = true;
                    break;
                }
            }
            var contact = document.getElementById("contact").value.trim();
            var email = document.getElementById("email").value.trim();
            var date = document.getElementById("date").value; // Get selected date
            var today = new Date(); // Get current date
             var formattedDate = formatDate(today);
            var time = document.getElementById("time").value.trim();
            var sepcialization = document.getElementById("sepcialization").value;
            var doctor = document.getElementById("doctor").value;
            var errors = [];

            // Validate name field
            if (name === "") {
                errors.push("Name is required");
            }

            // Validate date of birth
            if (dob === "") {
                errors.push("Date of Birth is required");
            }

            // Validate gender
            if (!radioChecked) {
                errors.push("Gender is required");
            }

            // Validate contact number
            if (contact === "") {
                errors.push("Contact number is required");
            } else if (!/^\d{10}$/.test(contact)) {
                errors.push("Invalid contact number");
            }

            // Validate email field
            if (email === "") {
                errors.push("Email is required");
            } else if (!/^\S+@\S+\.\S+$/.test(email)) {
                errors.push("Invalid email format");
            }

            // Validate date
            if (date === "") {
                errors.push("Date is required");
            } else if (date < formattedDate) {
                errors.push("Please select a current or future date for the appointment");
            }

            // Validate time
            if (time === "") {
                errors.push("Time is required");
            }

            // Validate sepcialization dropdown
            if (sepcialization === "none") {
                errors.push("Please select an valid option from the sepcialization dropdown");
            }

            // Validate doctor dropdown
            if (doctor === "none") {
                errors.push("Please select an valid option from the docotr dropdown");
            }


            // Display error messages if any
            if (errors.length > 0) {
                alert(errors.join("\n"));
                return false; // Prevent form submission
            }

            // Form is valid, allow submission
            return true;
        }

        function formatDate(date) {
            const year = date.getFullYear();
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const day = String(date.getDate()).padStart(2, '0');
            // Format the date in yyyy-mm-dd
            const formattedDate = year + '-' + month + '-' + day;
         return formattedDate;
        }
       