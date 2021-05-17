$("body").on("click", ".modal-show", function (event) {
    event.preventDefault();

    var me = $(this),
        url = me.attr("href"),
        title = me.attr("title");

    $("#modal-title").text(title);
    $("#modal-btn-save")
        .removeClass("hide")
        .text(me.hasClass("edit") ? "Ubah" : "Simpan");

    $.ajax({
        url: url,
        dataType: "html",
        success: function (response) {
            $("#modal-body").html(response);
        }
    });

    $("#modal").modal("show");
});

$("#modal-btn-save").click(function (event) {
    event.preventDefault();

    var form = $("#modal-body form"),
        url = form.attr("action"),
        method = $("input[name=_method]").val() == undefined ? "POST" : "PUT";

    form.find(".help-block").remove();
    form.find(".form-group").removeClass("has-error");

    $.ajax({
        url: url,
        method: method,
        data: form.serialize(),
        success: function (response) {
            form.trigger("reset");
            $("#modal").modal("hide");
            $("#datatableBeras")
                .DataTable()
                .ajax.reload();
            $("#datatableUang")
                .DataTable()
                .ajax.reload();
            $("#datatable")
                .DataTable()
                .ajax.reload();

            swal({
                type: "success",
                title: "Berhasil!",
                text: "Data berhasil disimpan!"
            });
        },
        error: function (xhr) {
            var res = xhr.responseJSON;
            if ($.isEmptyObject(res) == false) {
                $.each(res.errors, function (key) {
                    $("#" + key)
                        .closest(".form-group")
                        .addClass("has-error")
                        .append(
                            '<span class="help-block"><strong>Ups Maaf, kolom tidak boleh kosong !</strong></span>'
                        );
                });
            }
        }
    });
});

$("body").on("click", ".btn-delete", function (event) {
    event.preventDefault();

    var me = $(this),
        url = me.attr("href"),
        title = me.attr("title"),
        csrf_token = $('meta[name="csrf-token"]').attr("content");

    swal({
        title: "Anda yakin menghapus " + title + " ?",
        text: "Data yang telah dihapus tidak dapat dikembalikan lagi",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Batal",
        confirmButtonText: "Ya, saya yakin!"
    }).then(result => {
        if (result.value) {
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    _method: "DELETE",
                    _token: csrf_token
                },
                success: function (response) {
                    $("#datatableUang")
                        .DataTable()
                        .ajax.reload();
                    $("#datatableBeras")
                        .DataTable()
                        .ajax.reload();
                    $("#datatable")
                        .DataTable()
                        .ajax.reload();
                    swal({
                        type: "success",
                        title: "Berhasil !",
                        text: "Data berhasil dihapus!"
                    });
                },
                error: function (xhr) {
                    swal({
                        type: "error",
                        title: "Oops...",
                        text: "Ada yang tidak beres!"
                    });
                }
            });
        }
    });
});

$("body").on("click", ".btn-show", function (event) {
    event.preventDefault();

    var me = $(this),
        url = me.attr("href"),
        title = me.attr("title");

    $("#modal-title").text(title);
    $("#modal-btn-save").addClass("hide");

    $.ajax({
        url: url,
        dataType: "html",
        success: function (response) {
            $("#modal-body").html(response);
        }
    });

    $("#modal").modal("show");
});
