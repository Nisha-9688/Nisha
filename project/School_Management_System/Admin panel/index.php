<?php
include_once("header.php");
?>
<style>
  body {
    background-color: #f5f7fa;
  }

 .info-card {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  height: 180px; /* Increased height */
  padding: 1rem;
  background: #fff;
  border-radius: 8px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
  transition: transform 0.3s ease;
}

.info-card:hover {
  transform: translateY(-5px);
}

.info-card .icon {
  font-size: 3rem;
  margin-bottom: 0.5rem;
}

.info-card div {
  text-align: center;
}
  .card-header {
    background-color: #f9f9f9;
    font-weight: 600;
  }
</style>
<div class="body-wrapper-inner">
  <div class="container-fluid">
    <!-- Header -->
    <nav class="navbar navbar-light bg-white shadow-sm px-4 py-2">
      <input class="form-control w-25" type="search" placeholder="Find Something..." aria-label="Search">
    </nav>

    <!-- Info Cards -->
    <div class="container my-4">
      <div class="row g-4">
        <div class="col-md-6">
          <div class="info-card">
            <i class="ti ti-users fs-9"></i>
            <div class="text-secondary text-uppercase pb-4">
              <div>Students</div>
              <div><?php echo $studentcount; ?></div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="info-card">
            <i class="ti ti-chalkboard-teacher fs-10"></i>
            <div class="text-secondary text-uppercase pb-4">
              <div>Teachers</div>
              <div><?php echo $teachercount; ?></div>
            </div>
          </div>
        </div>
      </div>

      <!-- Charts and Panels -->
      <div class="row g-4 mt-3">
        <!-- Donut Chart -->
        <div class="col-md-4">
          <div class="card">
            <div class="card-header">Students</div>
            <div class="card-body">
              <canvas id="donutChart"></canvas>
              <div class="text-center mt-2">
                <small><?php echo $femaleCount; ?> Female / <?php echo $maleCount; ?> Male</small>
              </div>
            </div>
          </div>
        </div>

        <!-- Event Calendar -->
        <div class="col-md-5">
          <div class="card">
            <div class="card-header">Event Calendar</div>
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <button class="btn btn-sm btn-light" onclick="changeMonth(-1)">&#8592;</button>
                <h6 id="monthYear"></h6>
                <button class="btn btn-sm btn-light" onclick="changeMonth(1)">&#8594;</button>
              </div>
              <table class="table table-bordered text-center">
                <thead>
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
                <tbody id="calendar-body">
                  <!-- Calendar will be injected here -->
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <!-- Notice Board -->
        <div class="col-md-3">
          <div class="card h-100">
            <div class="card-header">Notice Board</div>
            <div class="card-body">
              <p><strong>16 June, 2019:</strong> Great School manage printing.</p>
              <p><strong>16 Jan, 2019:</strong> Great School manage some text of the printing.</p>
              <p><strong>16 June, 2019:</strong> Great School manage menesom.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="./assets/libs/jquery/dist/jquery.min.js"></script>
<script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="./assets/js/sidebarmenu.js"></script>
<script src="./assets/js/app.min.js"></script>
<script src="./assets/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="./assets/libs/simplebar/dist/simplebar.js"></script>
<script src="./assets/js/dashboard.js"></script>
<!-- solar icons -->
<script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>

<script>
  const ctx = document.getElementById('donutChart').getContext('2d');
   const femaleCount = <?php echo $femaleCount; ?>;
  const maleCount   = <?php echo $maleCount; ?>;

  new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ['Female Students', 'Male Students'],
      datasets: [{
        label: 'Students',
        data: [femaleCount, maleCount],
        backgroundColor: ['#3366cc', '#ff9900'],
        hoverOffset: 10
      }]
    },
    options: {
      cutout: '70%',
      plugins: {
        legend: {
          position: 'bottom'
        }
      }
    }
  });
</script>
<script>
  const calendarBody = document.getElementById('calendar-body');
  const monthYear = document.getElementById('monthYear');
  let currentDate = new Date();

  function renderCalendar(date) {
    const year = date.getFullYear();
    const month = date.getMonth();

    const firstDay = new Date(year, month, 1);
    const lastDate = new Date(year, month + 1, 0).getDate();
    const startDay = firstDay.getDay();

    monthYear.innerText = date.toLocaleString('default', { month: 'long', year: 'numeric' });

    let html = '';
    let day = 1;
    for (let i = 0; i < 6; i++) {
      let row = '<tr>';
      for (let j = 0; j < 7; j++) {
        if (i === 0 && j < startDay) {
          row += '<td></td>';
        } else if (day > lastDate) {
          row += '<td></td>';
        } else {
          const today = new Date();
          const isToday = day === today.getDate() && month === today.getMonth() && year === today.getFullYear();
          row += `<td class="${isToday ? 'bg-warning-subtle fw-bold' : ''}">${day}</td>`;
          day++;
        }
      }
      row += '</tr>';
      html += row;
      if (day > lastDate) break;
    }

    calendarBody.innerHTML = html;
  }

  function changeMonth(offset) {
    currentDate.setMonth(currentDate.getMonth() + offset);
    renderCalendar(currentDate);
  }

  renderCalendar(currentDate);
</script>

</body>

</html>