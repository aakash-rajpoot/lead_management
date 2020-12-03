<html>

<head>
    <meta charset="utf-8">
    <!-- custom css-->
    <link rel="stylesheet" href="<?=base_url('css/style.css')?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>


    <script src='https://use.fontawesome.com/2188c74ac9.js'></script>

</head>
<body>
<div id="table1">
    <div class="content-wrapper content-wrapper--with-bg">
        <div class="container">
            <div class="mt-5">
                <table id="dt-all-checkbox" class="table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th class="th-sm">Name
                            </th>
                            <th class="th-sm">Address
                            </th>
                            <th class="th-sm">Age
                            </th>
                            <th class="th-sm">Start date
                            </th>
                            <th class="th-lg">Action
                            </th>
                            <th class="th-sm">
                            </th>
                        </tr>
                    </thead>
                    <tbody class="table-bordered">
                        <tr>
                            <td>1</td>
                            <td>Aman Kumar Raghav</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td class="edit-icon"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Anil singh</td>
                            <td>Tokyo</td>
                            <td>63</td>
                            <td>2011/07/25</td>
                            <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>sohan pal singh</td>
                            <td>San Francisco</td>
                            <td>66</td>
                            <td>2009/01/12</td>
                            <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Anaya chauhan</td>
                            <td>Edinburgh</td>
                            <td>22</td>
                            <td>2012/03/29</td>
                            <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Aarvi kumari</td>
                            <td>Tokyo</td>
                            <td>33</td>
                            <td>2008/11/28</td>
                            <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Divisha rathor</td>
                            <td>New York</td>
                            <td>61</td>
                            <td>2012/12/02</td>
                            <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td> Fender</td>
                            <td>San Francisco</td>
                            <td>59</td>
                            <td>2012/08/06</td>
                            <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Duncan</td>
                            <td>Tokyo</td>
                            <td>55</td>
                            <td>2010/10/14</td>
                            <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Hendrix</td>
                            <td>San Francisco</td>
                            <td>39</td>
                            <td>2009/09/15</td>
                            <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>Leonidas</td>
                            <td>Edinburgh</td>
                            <td>23</td>
                            <td>2008/12/13</td>
                            <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td>Phoenix</td>
                            <td>London</td>
                            <td>30</td>
                            <td>2008/12/19</td>
                            <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td>Aakash</td>
                            <td>Edinburgh</td>
                            <td>22</td>
                            <td>2013/03/03</td>
                            <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>13</td>
                            <td>Regional Director</td>
                            <td>San Francisco</td>
                            <td>36</td>
                            <td>2008/10/16</td>
                            <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>14</td>
                            <td>Senior Marketing Designer</td>
                            <td>London</td>
                            <td>43</td>
                            <td>2012/12/18</td>
                            <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>15</td>
                            <td>Suman</td>
                            <td>London</td>
                            <td>19</td>
                            <td>2010/03/17</td>
                            <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>16</td>
                            <td>Sohan</td>
                            <td>London</td>
                            <td>66</td>
                            <td>2012/11/27</td>
                            <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>17</td>
                            <td>Kajal</td>
                            <td>New York</td>
                            <td>64</td>
                            <td>2010/06/09</td>
                            <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>18</td>
                            <td>Amit</td>
                            <td>New York</td>
                            <td>59</td>
                            <td>2009/04/10</td>
                            <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>19</td>
                            <td>Ankur</td>
                            <td>London</td>
                            <td>41</td>
                            <td>2012/10/13</td>
                            <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>20</td>
                            <td>Personnel Lead</td>
                            <td>Edinburgh</td>
                            <td>35</td>
                            <td>2012/09/26</td>
                            <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>21</td>
                            <td>Palak</td>
                            <td>New York</td>
                            <td>30</td>
                            <td>2011/09/03</td>
                            <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>22</td>
                            <td>kavita</td>
                            <td>New York</td>
                            <td>40</td>
                            <td>2009/06/25</td>
                            <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>23</td>
                            <td>Chatan</td>
                            <td>New York</td>
                            <td>21</td>
                            <td>2011/12/12</td>
                            <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>24</td>
                            <td></td>
                            <td>Sidney</td>
                            <td>23</td>
                            <td>2010/09/20</td>
                            <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>25</td>
                            <td>Sohan pal</td>
                            <td>London</td>
                            <td>47</td>
                            <td>2009/10/09</td>
                            <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>26</td>
                            <td>Mohan</td>
                            <td>Edinburgh</td>
                            <td>42</td>
                            <td>2010/12/22</td>
                            <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td>27</td>
                            <td>Madhuvan</td>
                            <td>Singapore</td>
                            <td>28</td>
                            <td>2010/11/14</td>
                            <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i></td>
                            <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#dt-all-checkbox').dataTable({

            columnDefs: [{
                orderable: false,
                className: 'select-checkbox select-checkbox-all',
                targets: 0
            }],
            select: {
                style: 'multi',
                selector: 'td:first-child'
            }
        });
    });
</script>

</body>

</html>