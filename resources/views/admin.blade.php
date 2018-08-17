@extends('layouts.dashboard')

@section('content')
<!-- TITLE -->
<section class="welcome p-t-10">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="title-5">BERITA</h3>
        <hr class="line-seprate">
      </div>
    </div>
  </div>
</section>
<!-- SECTION BODY -->
<section class="statistic-chart">
  <div class="container">
    <div class="row">
      <!-- DATA TABLE-->  
      <div class="col-md-12">
        <div class="table-responsive m-b-40">
          <div class="table-data__tool">
            <div class="table-data__tool-left">
              <div class="rs-select2--light rs-select2--md">
                  <select class="js-select2" name="property">
                      <option selected="selected">Kategori</option>
                      <option value="">Option 1</option>
                      <option value="">Option 2</option>
                      <option value="">Option 3</option>
                      <option value="">Option 4</option>
                  </select>
                  <div class="dropDownSelect2"></div>
              </div>
              <div class="rs-select2--light rs-select2--sm">
                  <select class="js-select2" name="time">
                      <option selected="selected">Today</option>
                      <option value="">3 Days</option>
                      <option value="">1 Week</option>
                  </select>
                  <div class="dropDownSelect2"></div>
              </div>
              {{-- <button class="au-btn-filter"><i class="zmdi zmdi-filter-list"></i>filters</button> --}}
            </div>
            {{-- <div class="table-data__tool-right">
                <button class="au-btn au-btn-icon au-btn--green au-btn--small"><i class="zmdi zmdi-plus"></i>add item</button>
                <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                    <select class="js-select2" name="type">
                        <option selected="selected">Export</option>
                        <option value="">Option 1</option>
                        <option value="">Option 2</option>
                    </select>
                    <div class="dropDownSelect2"></div>
                </div>
            </div> --}}
          </div>
          <table class="table table-borderless table-data3">
              <thead>
                  <tr>
                      <th>tanggal</th>
                      <th>kategori</th>
                      <th>description</th>
                      <th>status</th>
                      <th>price</th>
                      <th style="width: 1px;
                      padding-left: unset;
                      padding-right: unset;
                      text-align: center;">Tampil</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>2018-09-29 05:57</td>
                      <td>Mobile</td>
                      <td>iPhone X 64Gb Grey</td>
                      <td class="process">Processed</td>
                      <td>$999.00</td>
                      <td>
                          <label class="au-checkbox">
                              <input type="checkbox">
                              <span class="au-checkmark"></span>
                          </label>
                      </td>
                  </tr>
                  <tr>
                      <td>2018-09-28 01:22</td>
                      <td>Mobile</td>
                      <td>Samsung S8 Black</td>
                      <td class="process">Processed</td>
                      <td>$756.00</td>
                      <td>
                          <label class="au-checkbox">
                              <input type="checkbox">
                              <span class="au-checkmark"></span>
                          </label>
                      </td>
                  </tr>
                  <tr>
                      <td>2018-09-27 02:12</td>
                      <td>Game</td>
                      <td>Game Console Controller</td>
                      <td class="denied">Denied</td>
                      <td>$22.00</td>
                      <td>
                          <label class="au-checkbox">
                              <input type="checkbox">
                              <span class="au-checkmark"></span>
                          </label>
                      </td>
                  </tr>
                  <tr>
                      <td>2018-09-26 23:06</td>
                      <td>Mobile</td>
                      <td>iPhone X 256Gb Black</td>
                      <td class="denied">Denied</td>
                      <td>$1199.00</td>
                      <td>
                          <label class="au-checkbox">
                              <input type="checkbox">
                              <span class="au-checkmark"></span>
                          </label>
                      </td>
                  </tr>
                  <tr>
                      <td>2018-09-25 19:03</td>
                      <td>Accessories</td>
                      <td>USB 3.0 Cable</td>
                      <td class="process">Processed</td>
                      <td>$10.00</td>
                      <td>
                          <label class="au-checkbox">
                              <input type="checkbox">
                              <span class="au-checkmark"></span>
                          </label>
                      </td>
                  </tr>
                  <tr>
                      <td>2018-09-29 05:57</td>
                      <td>Accesories</td>
                      <td>Smartwatch 4.0 LTE Wifi</td>
                      <td class="denied">Denied</td>
                      <td>$199.00</td>
                      <td>
                          <label class="au-checkbox">
                              <input type="checkbox">
                              <span class="au-checkmark"></span>
                          </label>
                      </td>
                  </tr>
                  <tr>
                      <td>2018-09-24 19:10</td>
                      <td>Camera</td>
                      <td>Camera C430W 4k</td>
                      <td class="process">Processed</td>
                      <td>$699.00</td>
                      <td>
                          <label class="au-checkbox">
                              <input type="checkbox">
                              <span class="au-checkmark"></span>
                          </label>
                      </td>
                  </tr>
                  <tr>
                      <td>2018-09-22 00:43</td>
                      <td>Computer</td>
                      <td>Macbook Pro Retina 2017</td>
                      <td class="process">Processed</td>
                      <td>$10.00</td>
                      <td>
                          <label class="au-checkbox">
                              <input type="checkbox">
                              <span class="au-checkmark"></span>
                          </label>
                      </td>
                  </tr>
              </tbody>
          </table>
          <nav aria-label="Page navigation example" style="padding-top: 20px;">
              <ul class="pagination justify-content-end">
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
      <!-- DATA FORM -->  
      <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>Buat Baru</strong> / Edit
            </div>
            <div class="card-body card-block">
                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label class=" form-control-label">Static</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <p class="form-control-static">Username</p>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Text Input</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="text-input" placeholder="Text" class="form-control">
                            <small class="form-text text-muted">This is a help text</small>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="email-input" class=" form-control-label">Email Input</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="email" id="email-input" name="email-input" placeholder="Enter Email" class="form-control">
                            <small class="help-block form-text">Please enter your email</small>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="password-input" class=" form-control-label">Password</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="password" id="password-input" name="password-input" placeholder="Password" class="form-control">
                            <small class="help-block form-text">Please enter a complex password</small>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="disabled-input" class=" form-control-label">Disabled Input</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="disabled-input" name="disabled-input" placeholder="Disabled" disabled="" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="textarea-input" class=" form-control-label">Textarea</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea name="textarea-input" id="textarea-input" rows="9" placeholder="Content..." class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="select" class=" form-control-label">Select</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="select" id="select" class="form-control">
                                <option value="0">Please select</option>
                                <option value="1">Option #1</option>
                                <option value="2">Option #2</option>
                                <option value="3">Option #3</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="selectLg" class=" form-control-label">Select Large</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="selectLg" id="selectLg" class="form-control-lg form-control">
                                <option value="0">Please select</option>
                                <option value="1">Option #1</option>
                                <option value="2">Option #2</option>
                                <option value="3">Option #3</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="selectSm" class=" form-control-label">Select Small</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="selectSm" id="SelectLm" class="form-control-sm form-control">
                                <option value="0">Please select</option>
                                <option value="1">Option #1</option>
                                <option value="2">Option #2</option>
                                <option value="3">Option #3</option>
                                <option value="4">Option #4</option>
                                <option value="5">Option #5</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="disabledSelect" class=" form-control-label">Disabled Select</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="disabledSelect" id="disabledSelect" disabled="" class="form-control">
                                <option value="0">Please select</option>
                                <option value="1">Option #1</option>
                                <option value="2">Option #2</option>
                                <option value="3">Option #3</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="multiple-select" class=" form-control-label">Multiple select</label>
                        </div>
                        <div class="col col-md-9">
                            <select name="multiple-select" id="multiple-select" multiple="" class="form-control">
                                <option value="1">Option #1</option>
                                <option value="2">Option #2</option>
                                <option value="3">Option #3</option>
                                <option value="4">Option #4</option>
                                <option value="5">Option #5</option>
                                <option value="6">Option #6</option>
                                <option value="7">Option #7</option>
                                <option value="8">Option #8</option>
                                <option value="9">Option #9</option>
                                <option value="10">Option #10</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label class=" form-control-label">Radios</label>
                        </div>
                        <div class="col col-md-9">
                            <div class="form-check">
                                <div class="radio">
                                    <label for="radio1" class="form-check-label ">
                                        <input type="radio" id="radio1" name="radios" value="option1" class="form-check-input">Option 1
                                    </label>
                                </div>
                                <div class="radio">
                                    <label for="radio2" class="form-check-label ">
                                        <input type="radio" id="radio2" name="radios" value="option2" class="form-check-input">Option 2
                                    </label>
                                </div>
                                <div class="radio">
                                    <label for="radio3" class="form-check-label ">
                                        <input type="radio" id="radio3" name="radios" value="option3" class="form-check-input">Option 3
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label class=" form-control-label">Inline Radios</label>
                        </div>
                        <div class="col col-md-9">
                            <div class="form-check-inline form-check">
                                <label for="inline-radio1" class="form-check-label ">
                                    <input type="radio" id="inline-radio1" name="inline-radios" value="option1" class="form-check-input">One
                                </label>
                                <label for="inline-radio2" class="form-check-label ">
                                    <input type="radio" id="inline-radio2" name="inline-radios" value="option2" class="form-check-input">Two
                                </label>
                                <label for="inline-radio3" class="form-check-label ">
                                    <input type="radio" id="inline-radio3" name="inline-radios" value="option3" class="form-check-input">Three
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label class=" form-control-label">Checkboxes</label>
                        </div>
                        <div class="col col-md-9">
                            <div class="form-check">
                                <div class="checkbox">
                                    <label for="checkbox1" class="form-check-label ">
                                        <input type="checkbox" id="checkbox1" name="checkbox1" value="option1" class="form-check-input">Option 1
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label for="checkbox2" class="form-check-label ">
                                        <input type="checkbox" id="checkbox2" name="checkbox2" value="option2" class="form-check-input"> Option 2
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label for="checkbox3" class="form-check-label ">
                                        <input type="checkbox" id="checkbox3" name="checkbox3" value="option3" class="form-check-input"> Option 3
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label class=" form-control-label">Inline Checkboxes</label>
                        </div>
                        <div class="col col-md-9">
                            <div class="form-check-inline form-check">
                                <label for="inline-checkbox1" class="form-check-label ">
                                    <input type="checkbox" id="inline-checkbox1" name="inline-checkbox1" value="option1" class="form-check-input">One
                                </label>
                                <label for="inline-checkbox2" class="form-check-label ">
                                    <input type="checkbox" id="inline-checkbox2" name="inline-checkbox2" value="option2" class="form-check-input">Two
                                </label>
                                <label for="inline-checkbox3" class="form-check-label ">
                                    <input type="checkbox" id="inline-checkbox3" name="inline-checkbox3" value="option3" class="form-check-input">Three
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="file-input" class=" form-control-label">File input</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="file" id="file-input" name="file-input" class="form-control-file">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="file-multiple-input" class=" form-control-label">Multiple File input</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="file" id="file-multiple-input" name="file-multiple-input" multiple="" class="form-control-file">
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Submit
                </button>
                <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection