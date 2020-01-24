$(document).ready(function() {
  // dataTable
  $("#table").DataTable({
    responsive: true,
    pageLength: 5,
    aaSorting: [],
    lengthChange: false,
    language: {
      search: '<i class="fas fa-search" aria-hidden="true"></i>',
      searchPlaceholder: "Search..."
    }
  });
  // end dataTable
});
