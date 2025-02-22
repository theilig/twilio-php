<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Preview\Bulkexports\Export;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class ExportCustomJobTest extends HolodeckTestCase {
    public function testReadRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->preview->bulkExports->exports("resource_type")
                                               ->exportCustomJobs->read();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://preview.twilio.com/BulkExports/Exports/resource_type/Jobs'
        ));
    }

    public function testReadEmptyResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "meta": {
                    "previous_page_url": null,
                    "url": "https://preview.twilio.com/BulkExports/Exports/Messages/Jobs?PageSize=50&Page=0",
                    "page_size": 50,
                    "key": "jobs",
                    "first_page_url": "https://preview.twilio.com/BulkExports/Exports/Messages/Jobs?PageSize=50&Page=0",
                    "next_page_url": null,
                    "page": 0
                },
                "jobs": []
            }
            '
        ));

        $actual = $this->twilio->preview->bulkExports->exports("resource_type")
                                                     ->exportCustomJobs->read();

        $this->assertNotNull($actual);
    }

    public function testReadFullResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "meta": {
                    "previous_page_url": null,
                    "url": "https://preview.twilio.com/BulkExports/Exports/Messages/Jobs?PageSize=50&Page=0",
                    "page_size": 50,
                    "key": "jobs",
                    "first_page_url": "https://preview.twilio.com/BulkExports/Exports/Messages/Jobs?PageSize=50&Page=0",
                    "next_page_url": null,
                    "page": 0
                },
                "jobs": [
                    {
                        "start_day": "start_day",
                        "job_sid": "JSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "friendly_name": "friendly_name",
                        "webhook_method": "webhook_method",
                        "details": {},
                        "end_day": "end_day",
                        "webhook_url": "webhook_url",
                        "email": "email",
                        "resource_type": "resource_type"
                    }
                ]
            }
            '
        ));

        $actual = $this->twilio->preview->bulkExports->exports("resource_type")
                                                     ->exportCustomJobs->read();

        $this->assertGreaterThan(0, count($actual));
    }

    public function testCreateRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->preview->bulkExports->exports("resource_type")
                                               ->exportCustomJobs->create();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'post',
            'https://preview.twilio.com/BulkExports/Exports/resource_type/Jobs'
        ));
    }

    public function testCreateResponse() {
        $this->holodeck->mock(new Response(
            201,
            '
            {
                "start_day": "start_day",
                "job_sid": "JSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "friendly_name": "friendly_name",
                "webhook_method": "webhook_method",
                "details": {},
                "end_day": "end_day",
                "webhook_url": "webhook_url",
                "email": "email",
                "resource_type": "resource_type"
            }
            '
        ));

        $actual = $this->twilio->preview->bulkExports->exports("resource_type")
                                                     ->exportCustomJobs->create();

        $this->assertNotNull($actual);
    }
}