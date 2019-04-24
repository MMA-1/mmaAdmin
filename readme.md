<H2>MMA</H2>
<p>This is my first laravel project on git.</p>
asp--------------------------------------------------
<add name="ConnStr" connectionString="Data Source=.;Initial Catalog=Shopongo;user id=sa;Password=sa1234;" providerName="System.Data.SqlClient" />
javascript-------------------------------------------
function getStore() {
    var obj = new Object();
    //obj.UserId = id
    var token = getloginSession().access_token;
    var param = JSON.stringify(obj);
    $.ajax({
        type: "POST",
        url: "/api/StoreApi/getStore",
        headers: {
            Authorization: 'Bearer ' + token,
        },
        data: param,
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        beforeSend: function () {
            startSpinner();
        },
        complete: function () {
            stopSpinner();
        },
        success: function (data) {
            if (data != "") {
                $('#StoreId').empty();
                $('#StoreId').append('<option value="">Select Store</option>');
                $.each(data, function (key, value) {
                    $('#StoreId').append('<option value="' + value.StoreId + '">' + value.StoreName + '</option>');
                });
            }
        },
        error: function (r) {
        }
    });
}

add item bulk----------------------------------------------------------------------------------------------------
function LoadItems() {

    if ($('#ItemsFile').val() == "" || $('#ItemsFile').val() == undefined) {
        showError("File is required.");
        $('#ItemsFile').focus();
        return false;
    }
    var JSONObject = new Array();
    var cnt = $("#tblListItem tbody tr").length;
    $('#tblListItem tbody tr').each(function () {
        if ($(this).index() >= cnt) {
            return false;
        }
        var obj = new Object();
        obj.ItemName = $(this).find("td:eq(1)").html();
        obj.ItemBarCode = $(this).find("td:eq(2)").html();
        obj.ItemPrice = $(this).find("td:eq(3)").html();
        obj.SellingMethodId = $('#SellingMethodId').val();
        obj.IsPromotional = 0;
        obj.ItemDetail = $(this).find("td:eq(4)").html();
        
        JSONObject.push(obj);
    });
    
    var token = getloginSession().access_token;
    var param = JSON.stringify(JSONObject);
    $.ajax({
        type: "POST",
        url: "/api/ItemsApi/insUpdItemsBulk",
        headers: {
            Authorization: 'Bearer ' + token,
        },
        data: param,
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        beforeSend: function () {
            startSpinner();
        },
        complete: function () {
            stopSpinner();
        },
        success: function (data) {
            if (data >= 1) {
                alert(data + "Item(s) added successfully.");
                location.href = "/Admin/ListItems";
            }
            else {
                showError("Item is not added.");
            }

        },
        error: function (r) {
            showError("Somthing is going wrong.");
            if (r.status == 401) {
                removeloginSession();
            }
        }
    });
}
dapper--------------------------------------------------------------------------------
[ActionName("insUpdItemsBulk")]
        public IHttpActionResult placeOrders([FromBody] List<ItemsModelBulk> itemsModel)
        {
            var Result = (dynamic)null;
            try
            {
                var identity = (ClaimsIdentity)User.Identity;
                
                DataTable tdItemList = Common.ToDataTable(itemsModel);
                using (IDbConnection db = sqlConn)
                {
                    string SqlProc = "InsUpdItemsBulk";
                    Result = db.Execute(SqlProc, new
                    {
                        CreatedBy = identity.FindFirst(ClaimTypes.NameIdentifier).Value,
                        UpdatedBy = identity.FindFirst(ClaimTypes.NameIdentifier).Value,
                        ItemList = tdItemList.AsTableValuedParameter("dbo.TT_ItemType")
                        //OrderCart.AsTableValuedParameter("dbo.UT_OrderDetail")
                    }, commandType: CommandType.StoredProcedure);
                }
                return Content(HttpStatusCode.OK, Result);
            }
            catch (Exception ex)
            {
                Result = ex.Message;
                return Content(HttpStatusCode.InternalServerError, Result);
            }
        }
  -------------------------------------------------------------------------------------
