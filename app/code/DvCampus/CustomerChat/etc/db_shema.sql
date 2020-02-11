<?xml version="1.0"?>
<schema xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:noNamespaceSchemaLocation="urn:magento:framework:Setup/Declaration/Schema/etc/schema.xsd">
    <table name="dv_campus_customer_chat" resource="default" engine="innodb" comment="Customer Chat">
        <column xsi:type="int" name="message_id" padding="10" unsigned="true" nullable="false" identity="true"
                comment="Message ID"
        />
        <column xsi:type="int" name="author_id" padding="10" unsigned="true" nullable="false"
                comment="Author ID"
        />
        <column xsi:type="smallint" name="website_id" padding="5" unsigned="true" nullable="false"
                comment="Website ID"
        />
        <column xsi:type="timestamp" name="created_at" on_update="false" nullable="false" default="CURRENT_TIMESTAMP"
                comment="Creation Time"
        />
        <column xsi:type="varchar" name="author_type" nullable="false" length="127"
                comment="Author Type"
        />
        <column xsi:type="varchar" name="message" nullable="false" length="255"
                comment="Message"
        />
        <column xsi:type="varchar" name="chat_hash" nullable="false" length="127"
                comment="Chat Hash"/>
        <column xsi:type="varchar" name="author_name" nullable="false" length="127"
                comment="Author Name"
        />

        <constraint xsi:type="primary" referenceId="PRIMARY">
            <column name="message_id"/>
        </constraint>
        <index referenceId="DV_CAMPUS_CUSTOMER_CHAT_MESSAGE_ID" indexType="btree">
            <column name="message_id"/>
        </index>
        <index referenceId="DV_CAMPUS_CUSTOMER_CHAT_CHAT_HASH" indexType="btree">
            <column name="chat_hash"/>
        </index>
        <index referenceId="DV_CAMPUS_CUSTOMER_CHAT_WEBSITE_ID" indexType="btree">
            <column name="website_id"/>
        </index>

        <constraint xsi:type="foreign"
                    referenceId="DV_CAMPUS_CUSTOMER_CHAT_CUSTOMER_WEBSITE"
                    table="dv_campus_customer_chat"
                    column="website_id"
                    referenceTable="customer_website"
                    referenceColumn="website_id"
                    onDelete="CASCADE"
        />
        <constraint xsi:type="unique"
                    referenceId="DV_CAMPUS_CUSTOMER_CHAT_MESSAGE_ID_WEBSITE_ID_CHAT_HASH"
        >
            <column name="message_id"/>
            <column name="website_id"/>
            <column name="chat_hash"/>
        </constraint>
    </table>
</schema>