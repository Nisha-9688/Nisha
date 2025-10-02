<?php 
include_once("header.php");
?>
<!-- Calendar Section Start -->
<div class="container-fluid mt-4">
  <div class="card">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
      <button class="btn btn-light btn-sm" onclick="changeMonth(-1)">&#8592; Prev</button>
      <h5 id="monthYear" class="mb-0 text-white"></h5>
      <button class="btn btn-light btn-sm" onclick="changeMonth(1)">Next &#8594;</button>
    </div>
    <div class="card-body">
      <div class="d-flex justify-content-center mb-3">
        <select id="yearSelect" class="form-select w-auto" onchange="changeYear(this.value)">
          <!-- Years will populate here -->
        </select>
      </div>
      <div class="table-responsive">
  <table class="table table-bordered text-center" id="calendarTable">
    <thead class="table-primary">
      <tr>
        <th>Sun</th>
        <th>Mon</th>
        <th>Tue</th>
        <th>Wed</th>
        <th>Thu</th>
        <th>Fri</th>
        <th>Sat</th>
      </tr>
    </thead>
    <tbody id="calendarBody">
      <!-- Calendar rows will be generated here -->
    </tbody>
  </table>
</div>
    </div>
  </div>
</div>
<!-- Calendar Section End -->
<!-- Calendar Styling -->
<style>
td {
  width: 100px;
  height: 100px;
  vertical-align: top;
  text-align: left;
  padding: 5px;
}

  td small {
    font-size: 11px;
  }
</style>


<!-- Calendar Script -->
<script>
  let currentDate = new Date();
  let currentMonth = currentDate.getMonth();
  let currentYear = currentDate.getFullYear();

 function generateCalendar(month, year) {
  const calendarBody = document.getElementById("calendarBody");
  const monthYear = document.getElementById("monthYear");
  const today = new Date();
  const holidays = {
  "2025-01-26": "Republic Day",
  "2025-08-09": "Rakshbandhan",
  "2025-08-15": "Independence Day",
  "2025-08-16": "Janamastmi",
  "2025-10-02": "Gandhi Jayanti",
  "2025-12-25": "Christmas",
  "2025-11-01": "School Foundation Day",
  "2025-03-08": "Women's Day",
  "2025-05-01": "Labor Day"
  // Add more YYYY-MM-DD: "Holiday Name" pairs here
};


  const firstDay = new Date(year, month, 1).getDay();
  const lastDate = new Date(year, month + 1, 0).getDate();

  const monthNames = [
    "January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December"
  ];

  monthYear.innerText = `${monthNames[month]} ${year}`;
  calendarBody.innerHTML = "";

  let day = 1;
  for (let week = 0; week < 6; week++) {
    const row = document.createElement("tr");
  

    for (let d = 0; d < 7; d++) {
      const cell = document.createElement("td");
    

      const cellIndex = week * 7 + d;
      if (cellIndex >= firstDay && day <= lastDate) {
        if (cellIndex >= firstDay && day <= lastDate) {
  const isToday =
    day === today.getDate() &&
    month === today.getMonth() &&
    year === today.getFullYear();

  const dateStr = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
  const holidayName = holidays[dateStr];

  let content = `<strong>${day}</strong>`;

  if (holidayName) {
    content += `<br><small class="text-primary">${holidayName}</small>`;
    cell.classList.add("bg-warning", "text-dark");
  } else {
    if (isToday) {
      cell.classList.add("bg-primary", "text-white");
    } else {
      cell.classList.add("bg-light", "text-dark");
    }
  }

  cell.style.borderRadius = "8px";
  cell.innerHTML = content;
  day++;
} else {
  cell.innerHTML = "";
}

      } else {
        cell.innerHTML = "";
      }

      row.appendChild(cell);
    }

    calendarBody.appendChild(row);

    if (day > lastDate) break;
  }

  document.getElementById("yearSelect").value = year;
}


  function changeMonth(delta) {
    currentMonth += delta;
    if (currentMonth < 0) {
      currentMonth = 11;
      currentYear--;
    } else if (currentMonth > 11) {
      currentMonth = 0;
      currentYear++;
    }
    generateCalendar(currentMonth, currentYear);
  }

  function changeYear(selectedYear) {
    currentYear = parseInt(selectedYear);
    generateCalendar(currentMonth, currentYear);
  }

  function populateYearDropdown() {
  const yearSelect = document.getElementById("yearSelect");
  const startYear = 2000;
  const endYear = new Date().getFullYear(); // Only up to current year

  for (let y = startYear; y <= endYear; y++) {
    const option = document.createElement("option");
    option.value = y;
    option.textContent = y;
    yearSelect.appendChild(option);
  }
}


  // Initial load
  populateYearDropdown();
  generateCalendar(currentMonth, currentYear);
</script>