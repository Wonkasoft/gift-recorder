<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://wonkasoft.com
 * @since      1.0.0
 *
 * @package    Gift_Recorder
 * @subpackage Gift_Recorder/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Gift_Recorder
 * @subpackage Gift_Recorder/admin
 * @author     Wonkasoft <support@wonkasoft.com>
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) die;

global $wpdb;
$charset_collate = $wpdb->get_charset_collate();
$table_name =$wpdb->prefix . "giftrecorder";

$results = $wpdb->get_results( "SELECT * FROM $table_name limit 10" ); // Query to fetch data from database table and storing in $results

?>
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <h1>Gift Recorder Dashboard</h1>
      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Members</a>
          <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Member Details</a>
          <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Manage Users</a>
        </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
          <h3>Members</h3>
            <table class="table table-hover">
             <thead class="thead-dark">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">First</th>
                  <th scope="col">Last</th>
                  <th scope="col">Email</th>
                  <th scope="col">Phone</th>
                  <th scope="col">Address</th>
                  <th scope="col">City</th>
                  <th scope="col">State</th>
                  <th scope="col">Zip</th>
                  <th scope="col">Gift</th>
                  <th scope="col">Score</th>
                </tr>
              </thead>
              <tbody id="members-table">
              </tbody>
            </table>
            <div class="form-group row justify-content-center">
              <label for="number-records" class="col-2 col-form-label text-center">Number of records</label>
              <div class="col-1">
                <input class="form-control text-center" type="number" value="10" id="member-number-records">
              </div>
            </div>
            <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#">Next</a>
                </li>
              </ul>
            </nav>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
          <h3>Single Member</h3>
            <table class="table table-hover">
             <thead class="thead-dark">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">First</th>
                  <th scope="col">Last</th>
                  <th scope="col">Email</th>
                  <th scope="col">Phone</th>
                  <th scope="col">Address</th>
                  <th scope="col">City</th>
                  <th scope="col">State</th>
                  <th scope="col">Zip</th>
                  <th scope="col">Gift</th>
                  <th scope="col">Score</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row"><?php echo $results[0]->id; ?></th>
                  <td><?php echo $results[0]->first_name; ?></td>
                  <td><?php echo $results[0]->last_name; ?></td>
                  <td><?php echo $results[0]->email; ?></td>
                  <td><?php echo $results[0]->phone; ?></td>
                  <td><?php echo $results[0]->address; ?></td>
                  <td><?php echo $results[0]->city; ?></td>
                  <td><?php echo $results[0]->state; ?></td>
                  <td><?php echo $results[0]->zip; ?></td>
                  <td><?php echo $results[0]->your_gift; ?></td>
                  <td><?php echo $results[0]->score; ?></td>
                </tr>
              </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
          <h3>Manage Members</h3>
            <table class="table table-hover">
             <thead class="thead-dark">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">First</th>
                  <th scope="col">Last</th>
                  <th scope="col">Email</th>
                  <th scope="col">Phone</th>
                  <th scope="col">Address</th>
                  <th scope="col">City</th>
                  <th scope="col">State</th>
                  <th scope="col">Zip</th>
                  <th scope="col">Gift</th>
                  <th scope="col">Score</th>
                  <th scope="col">Edit/Delete</th>
                </tr>
              </thead>
              <tbody id="manage-users-table">
             
              </tbody>
            </table>
            <div class="form-group row text-center">
              <label for="number-records" class="col-1 col-form-label">Number of records</label>
              <div class="col-1">
                <input class="form-control" type="number" value="42" id="manage-user-number-records">
              </div>
            </div>
            <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#">Next</a>
                </li>
              </ul>
            </nav>
        </div>
      </div>
    </div>
  </div>
</div>