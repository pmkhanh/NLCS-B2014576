
<div class="container-fluid col-5">
<h2 class="text-center p-3 text-white my-3">Thêm Thể Loại Sách</h2>
    <form action="../model/categorys/handle.php" method="post">
        <div>
            <table class="table table-bordered">
                <tr>
                    <td class="text-center table-info">Mã Loại</td>
                    <td><input type="text" name="code_cate" class="w-100"></td>
                </tr>
                <tr>
                    <td class="text-center table-info">Tên Loại</td>
                    <td><input type="text" name="name_cate" class="w-100"></td>
                </tr>
                <tr>
                    <td class="text-center table-info">Chi Tiết</td>
                    <td><textarea name="description" cols="53" rows="5"></textarea></td>
                </tr>
            </table>
        </div>
        <div class="row">
            <div class="d-flex justify-content-center ">
                <button class="btn btn-primary w-50" type="submit" name="add">Thêm</button>
            </div>
        </div>
    </form>
</div>