<!DOCTYPE html>
<html lang="en">
  <?php include 'templates/all.user.php' ?>
  <?php include 'templates/home.head.php' ?>
  <body class="main-body">
    <main>
      <?php include 'templates/all.navbar.php' ?>
      <div class="container g-bg-white g-brd-around g-brd-white g-brd-2 g-mt-80 g-pt-20" style="min-height:100vh;">
        <?php if (!empty($_GET['status']) && $_GET['status'] == 'success') { ?>
        <!-- Success Alert -->
        <div class="alert alert-dismissible fade show g-bg-primary g-color-white rounded-0" role="alert">
          <button type="button" class="close u-alert-close--light" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
          <div class="media">
            <span class="d-flex g-mr-10 g-mt-5"><i class="icon-check g-font-size-25"></i></span>
            <span class="media-body align-self-center">
                We have received your message and will get back to you shortly! Feel free to join our discord if you have any questions.
            </span>
          </div>
        </div>
        <!-- End Success Alert -->
        <?php } else if (!empty($_GET['status']) && !empty($_GET['error']) && $_GET['status'] == 'failure') { ?>
        <!-- Success Alert -->
        <div class="alert alert-dismissible fade show g-bg-red g-color-white rounded-0" role="alert">
          <button type="button" class="close u-alert-close--light" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
          <div class="media">
            <span class="d-flex g-mr-10 g-mt-5"><i class="icon-check g-font-size-25"></i></span>
            <span class="media-body align-self-center">
                <strong>Application Submit Error</strong> <br />
                Error Message: <?php $_GET['error']; ?> <br />
                Please contact the site administrator if you see this message.
            </span>
          </div>
        </div>
        <!-- End Success Alert -->
        <?php } ?>

        <form enctype="multipart/form-data" id="appForm" method="post" action="library/action.sales.notify.php" class="g-brd-around bg-white g-brd-gray-light-v4 g-pa-20 g-ma-15">

          <div class="form-group g-mb-20">
            <div class="u-heading-v1-1 g-bg-main g-brd-gray-light-v2 g-mb-20">
                <h2 class="h3 u-heading-v1__title">World of Warcraft Sales Form</h2>
                <p><a href="https://us.battle.net/forums/en/wow/topic/20758726582?page=1">Antorus Prices</a></p>
            </div>
            <div class="row">
              <div class="form-group col-6 g-mb-20">
                <label for="contact">Contact Info (How should we contact you for more information?)</label>
                <input class="form-control rounded-0 u-form-control" type="text" name="contact" placeholder="Buddy#1234" required>
              </div>
              <div class="form-group col-6 g-mb-20">
                <label for="contact_type">Contact Type (Ex. BNET, Discord, Email, etc)</label>
                <input class="form-control rounded-0 u-form-control" type="text" name="contact_type" placeholder="Discord" required>
              </div>
              <div class="form-group col-12 g-mb-20">
                <label for="message">Let us Know what you are looking for!</label>
                <textarea id="message" class="form-control form-control-md rounded-0" rows="3" placeholder="" name="message" required></textarea>
              </div>
            </div>
          </div>

          <input type="hidden" name="redirect" value="sales.php?status=success">

          <div class="form-group g-mb-20">
            <button type="submit" class="btn btn-lg bg-blue">Send</button>
          </div>

        </form>

      </div>
    </main>
  </body>
  <?php include 'templates/home.js.php' ?>
</html>
