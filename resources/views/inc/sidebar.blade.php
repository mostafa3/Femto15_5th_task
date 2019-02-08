<!--  SideBar  -->
  <div class="nav flex-column sidebar">
    <a class="nav-link disabled side-title"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>

      <a class="nav-link side-link"  href="{{action('InventoryController@index')}}"><span>Inventories</span></a>
      <a class="nav-link side-link"  href="{{action('InventoryManagerController@index')}}"><span>Inventory Managers</span></a>

    <a class="nav-link side-link"  href="{{action('SupplierController@index')}}"><span>Suppliers</span></a>
    <a class="nav-link side-link"  href="{{action('ItemController@index')}}"><span>Items</span></a>
    <a class="nav-link side-link"  href="{{action('TransactionController@index')}}"><span>Transactions</span></a>
  </div>
