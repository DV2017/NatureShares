/*
$('button').on('click', function (event) {
    event.preventDefault();
    //get text of button
    let val = $(this).html().toLowerCase();
    console.log(val);
    getListing(val);
  });

  function getListing(val) {
    $.ajax({
      url: 'http://127.0.0.1:8000/' + val
    }).done(function (listings) {
      let output = '';
      $.each(listings, function (key, listing) {
        output += `

        <div className="col-md-2 card" style="cursor:pointer;" onclick="getCompany(this)">
          <img className="card-img-top" style="width:100%;" src="${listing.image}" alt="image"/>
          <div className="card-body">
            <input type="hidden" name="listing_id" value="${listing.id}"/>
            <h4 className="card-title">${listing.title}</h4>
            <p className="card-text">${listing.postcode}, ${listing.province}</p>
          </div>
        </div>

          `
      });
      $('#content').html("");
      $('#company').html("");
      $('#content').append(output);
    });
  }


  function getCompany(card) {
    $('#company').html(card);
    let co_id = $('input[name=listing_id]').val();
    getProjects(co_id);
  }

  function getProjects(co_id) {
    $.ajax({
      url: 'http://127.0.0.1:8000/companies/' + co_id + '/projects',
    }).done(function (listings) {
      let output = '';
      if (listings == '' || listings == 'undefined') {
        output += `<h3 class="lead">No projects</h3>`;
      } else {
        output += `<div class="lead">Projects</div>`;
        $.each(listings, function (key, listing) {
          output += `
          <div className="card" style="cursor:pointer;">
            <img className="card-img-top" style="width:100%;" src="${listing.image}" alt="image"/>
            <div className="card-body">
              <input type="hidden" name="listing_id" value="${listing.id}"/>
              <h4 className="card-title">${listing.title}</h4>
              <p className="card-text">${listing.address}</p>
            </div>
          </div>
      `;
        });
      }
      $('#content').html("");
      $('#content').append(output);
    });
  }

*/


