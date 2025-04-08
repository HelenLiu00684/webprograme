<?php
session_start(); // enable session

include_once "header.php";
?>
    <div id="container">
        <?php
            include_once "menu.php";
        ?>
        <div id="content">
            <h2>Employee Details</h2>

            <div>
                <label for="employeeSelect">Select an employee:</label>
                <select id="employeeSelect">
                    <option value="">-- Select an employee --</option>
                </select>
            </div>

            <div id="employeeDetailsContainer" style="margin-top: 20px;">
                <h4>Detailed Employee Information</h4>
                </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const employeeSelect = document.getElementById('employeeSelect');
                    const employeeDetailsContainer = document.getElementById('employeeDetailsContainer');

                    // Function to fetch employee list and populate the dropdown
                    function fetchEmployeeList() {
                        fetch('GetEmployee.php?action=list')
                            .then(response => response.json())
                            .then(employees => {
                                employees.forEach(employee => {
                                    const option = document.createElement('option');
                                    option.value = employee.EmployeeID;
                                    option.textContent = employee.FirstName+"   "+employee.LastName; // Only display last name
                                    employeeSelect.appendChild(option);
                                });
                            })
                            .catch(error => {
                                console.error('Error fetching employee list:', error);
                                employeeDetailsContainer.innerHTML = '<p>Error loading employee list.</p>';
                            });
                    }

                    // Function to fetch and display employee details
                    function fetchEmployeeDetails(EmployeeID) {
                        fetch(`GetEmployee.php?action=details&EmployeeID=${EmployeeID}`)
                            .then(response => response.json())
                            .then(employee => {
                                console.log(employee); 
                                if (employee) {
                                    let html = '<table>';
                                    html += '<thead><tr><th>First Name</th><th>Last Name</th><th>Email Address</th><th>Phone Number</th><th>SIN</th><th>Designation</th></tr></thead>';
                                    html += '<tbody>';
                                    html += `<tr>
                                                <td>${employee.FirstName || ''}</td>
                                                <td>${employee.LastName || ''}</td>
                                                <td>${employee.EmailAddress || ''}</td>
                                                <td>${employee.TelephoneNumber || ''}</td>
                                                <td>${employee.SocialInsuranceNumber || ''}</td>
                                                <td>${employee.Designation || ''}</td>
                                            </tr>`;
                                    html += '</tbody></table>';
                                    employeeDetailsContainer.innerHTML = html;
                                } else {
                                    employeeDetailsContainer.innerHTML = '<p>No information found for the selected employee.</p>';
                                }
                            })
                            .catch(error => {
                                console.error('Error fetching employee details:', error);
                                employeeDetailsContainer.innerHTML = '<p>Error loading employee details.</p>';
                            });
                    }

                    // Event listener for dropdown change
                    employeeSelect.addEventListener('change', function() {
                        const selectedEmployeeId = this.value;
                        if (selectedEmployeeId) {
                            fetchEmployeeDetails(selectedEmployeeId);
                        } else {
                            employeeDetailsContainer.innerHTML = '<h2>Detailed Employee Information</h2>'; // Clear details if no employee is selected
                        }
                    });

                    // Fetch employee list on page load
                    fetchEmployeeList();
                });
            </script>
        </div>
    </div>
<?php
include_once "footer.php"; // Assuming you have a footer.php file
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Employee Information</title>
        <link rel="stylesheet" type="text/css" href="StyleSheet.css" />
    </head>
    <body>
        </body>
</html>