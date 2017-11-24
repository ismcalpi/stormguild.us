
<!-- Success Alert -->
<div class="alert alert-dismissible fade show g-bg-primary g-color-white rounded-0" role="alert">
  <button type="button" class="close u-alert-close--light" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
  <div class="media">
    <span class="d-flex g-mr-10 g-mt-5"><i class="icon-check g-font-size-25"></i></span>
    <span class="media-body align-self-center">
        <strong>Congratulations!</strong> <br />
        You have successfully applied to Storm - Stormrage. You have been sent an E-Mail with more information on how to access your application.
    </span>
  </div>
</div>
<!-- End Success Alert -->
<form enctype="multipart/form-data" id="appForm" method="post" action="" class="g-brd-around bg-white g-brd-gray-light-v4 g-pa-20">
    <!-- Screening Questions -->
    <div class="form-group g-mb-20">
        <div class="u-heading-v1-1 g-bg-main g-brd-gray-light-v2 g-mb-20">
            <h2 class="h3 u-heading-v1__title">Screening Questions</h2>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h4 class="h6 g-font-weight-700 g-mb-20">You understand that you should put some thought and time into your application?</h4>
                <label class="form-check-inline u-check g-pl-25 g-ml-25 g-mr-25">
                    <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="radScreen1" type="radio" value="yes" required>
                    <div class="u-check-icon-radio-v4 g-absolute-centered--y g-left-0 g-width-18 g-height-18">
                        <i class="g-absolute-centered d-block g-width-10 g-height-10 g-bg-primary--checked"></i>
                    </div>
                    Yes
                </label>
                <label class="form-check-inline u-check g-pl-25 g-ml-25 g-mr-25">
                    <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="radScreen1" type="radio" value="no">
                    <div class="u-check-icon-radio-v4 g-absolute-centered--y g-left-0 g-width-18 g-height-18">
                        <i class="g-absolute-centered d-block g-width-10 g-height-10 g-bg-primary--checked"></i>
                    </div>
                    No
                </label>
            </div>
            <div class="col-lg-12">
                <h4 class="h6 g-font-weight-700 g-mb-20">Can you make all of our scheduled raids? Including the extra extended raid the week new Mythic content releases?</h4>
                <label class="form-check-inline u-check g-pl-25 g-ml-25 g-mr-25">
                    <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="radScreen2" type="radio" value="yes" required>
                    <div class="u-check-icon-radio-v4 g-absolute-centered--y g-left-0 g-width-18 g-height-18">
                        <i class="g-absolute-centered d-block g-width-10 g-height-10 g-bg-primary--checked"></i>
                    </div>
                    Yes
                </label>
                <label class="form-check-inline u-check g-pl-25 g-ml-25 g-mr-25">
                    <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="radScreen2" type="radio" value="no">
                    <div class="u-check-icon-radio-v4 g-absolute-centered--y g-left-0 g-width-18 g-height-18">
                        <i class="g-absolute-centered d-block g-width-10 g-height-10 g-bg-primary--checked"></i>
                    </div>
                    No
                </label>
            </div>
        </div>
    </div>
    <div class="form-group g-mb-20">
        <button type="submit" class="btn btn-lg bg-blue">Send Application</button>
    </div>
</form>
