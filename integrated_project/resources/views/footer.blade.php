<!-- [Page Specific JS] start -->
<script src="{{ asset('js/plugins/apexcharts.min.js') }}"></script>
<script src="{{ asset('js/pages/dashboard-default.js') }}"></script>
<!-- [Page Specific JS] end -->
<!-- Required Js -->
<script src="{{ asset('js/plugins/popper.min.js') }}"></script>
<script src="{{ asset('js/plugins/simplebar.min.js') }}"></script>
<script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/fonts/custom-font.js') }}"></script>
<script src="{{ asset('js/config.js') }}"></script>
<script src="{{ asset('js/pcoded.js') }}"></script>
<script src="{{ asset('js/plugins/feather.min.js') }}"></script>

<!-- [Page Specific JS] start -->
<!-- datatable Js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
<!-- <script src="{{ asset('plugins/dataTables.bootstrap5.min.js') }}"></script> -->
<script>
  // Esta función se ejecuta después de que Livewire carga o actualiza la página
  document.addEventListener('livewire:load', function() {
    // Reinicializar DataTables

    // [ DOM/jquery ]
    var total, pageTotal;
    var table = $('#dom-jqry').DataTable();

    // [ column Rendering ]
    $('#colum-render').DataTable({
      columnDefs: [{
          render: function(data, type, row) {
            return data + ' (' + row[3] + ')';
          },
          targets: 0
        },
        {
          visible: false,
          targets: [3]
        }
      ]
    });

    // [ Multiple Table Control Elements ]
    $('#multi-table').DataTable({
      dom: '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>'
    });

    // [ Complex Headers With Column Visibility ]
    $('#complex-header').DataTable({
      columnDefs: [{
        visible: false,
        targets: -1
      }]
    });

    // [ Language file ]
    $('#lang-file').DataTable({
      language: {
        url: '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/German.json'
      }
    });

    // [ Setting Defaults ]
    $('#setting-default').DataTable();

    // [ Row Grouping ]
    var table1 = $('#row-grouping').DataTable({
      columnDefs: [{
        visible: false,
        targets: 2
      }],
      order: [
        [2, 'asc']
      ],
      displayLength: 25,
      drawCallback: function(settings) {
        var api = this.api();
        var rows = api
          .rows({
            page: 'current'
          })
          .nodes();
        var last = null;

        api
          .column(2, {
            page: 'current'
          })
          .data()
          .each(function(group, i) {
            if (last !== group) {
              $(rows)
                .eq(i)
                .before('<tr class="group"><td colspan="5">' + group + '</td></tr>');

              last = group;
            }
          });
      }
    });

    // [ Order by the grouping ]
    $('#row-grouping tbody').on('click', 'tr.group', function() {
      var currentOrder = table.order()[0];
      if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
        table.order([2, 'desc']).draw();
      } else {
        table.order([2, 'asc']).draw();
      }
    });

    // [ Footer callback ]
    $('#footer-callback').DataTable({
      footerCallback: function(row, data, start, end, display) {
        var api = this.api(),
          data;

        // Remove the formatting to get integer data for summation
        var intVal = function(i) {
          return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
        };

        // Total over all pages
        total = api
          .column(4)
          .data()
          .reduce(function(a, b) {
            return intVal(a) + intVal(b);
          }, 0);

        // Total over this page
        pageTotal = api
          .column(4, {
            page: 'current'
          })
          .data()
          .reduce(function(a, b) {
            return intVal(a) + intVal(b);
          }, 0);

        // Update footer
        $(api.column(4).footer()).html('$' + pageTotal + ' ( $' + total + ' total)');
      }
    });

    // [ Custom Toolbar Elements ]
    $('#c-tool-ele').DataTable({
      dom: '<"toolbar">frtip'
    });

    // [ Custom Toolbar Elements ]
    $('div.toolbar').html('<b>Custom tool bar! Text/images etc.</b>');

    // [ custom callback ]
    $('#row-callback').DataTable({
      createdRow: function(row, data, index) {
        if (data[5].replace(/[\$,]/g, '') * 1 > 150000) {
          $('td', row).eq(5).addClass('highlight');
        }
      }
    });
  });
</script>
<script>
  // [ Configuration Option ]
  $('#res-config').DataTable({
    responsive: true
  });

  // [ New Constructor ]
  var newcs = $('#new-cons').DataTable();

  new $.fn.dataTable.Responsive(newcs);

  // [ Immediately Show Hidden Details ]
  $('#show-hide-res').DataTable({
    responsive: {
      details: {
        display: $.fn.dataTable.Responsive.display.childRowImmediate,
        type: ''
      }
    }
  });
</script>
<!-- [Page Specific JS] end -->
</body>
<!-- [Body] end -->

</html>