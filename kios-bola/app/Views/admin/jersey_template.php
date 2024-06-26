<tr>
    <th scope="row">{{index}}</th>
    <td><img src="/asset/img/jersey/{{sampul}}" alt="{{judul}}" class="sampul"></td>
    <td><img src="/asset/img/apparel/{{apparel}}" alt="{{judul}}" class="sampul"></td>
    <td><strong>{{id}}</strong></td>
    <td><strong>{{id_klub}}</strong></td>
    <td>{{judul}}</td>
    <td>{{slug}}</td>
    <td>{{ketersediaan}}</td>
    <td><strong>{{harga}}</strong></td>
    <td>{{created_at}}</td>
    <td>
        <div class="row">
            <div class="d-flex justify-content-center gap-3 align-items-center">
                <a href="/jersey/edit/{{slug}}"><i class="fa-solid fa-pen-to-square fa-xl" style="color: #358754;"></i></a>
                <form action="/admin/jersey/{{id}}" method="post" class="d-inline">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn" onclick="return confirm('apakah anda yakin ingin menghapusnya ?');"><i class="fa-solid fa-trash fa-xl" style="color: #ff0000;"></i></button>
                </form>
            </div>
        </div>
    </td>
</tr>