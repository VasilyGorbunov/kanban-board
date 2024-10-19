<?php

it('has group page', function () {
    $response = $this->get('/group');

    $response->assertStatus(200);
});
